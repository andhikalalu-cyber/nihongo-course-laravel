/**
 * Google Apps Script untuk Pendaftaran Kursus Jepang FNC
 * ========================================================
 * Cara Setup:
 * 1. Buka https://docs.google.com/ - buat Google Sheet baru
 * 2. Beri nama sheet: "Pendaftaran"
 * 3. Buka Extensions > Apps Script
 * 4. Copy semua kode ini ke Code.gs
 * 5. Klik Run (play) once untuk authorize
 * 6. Deploy > New deployment > Select type: Web app
 * 7. Execute as: Me
 * 8. Who has access: Anyone (anonim)
 * 9. Deploy & Copy URL
 * 10. Paste URL ke PendaftaranController.php
 */

const SHEET_NAME = 'Pendaftaran';
const SCRIPT_PROP = PropertiesService.getScriptProperties();

function setup() {
  const ss = SpreadsheetApp.getActiveSpreadsheet();
  SCRIPT_PROP.setProperty('key', ss.getId());
}

function doPost(e) {
  const lock = LockService.getScriptLock();
  lock.tryLock(10000);

  try {
    const doc = SpreadsheetApp.openById(SCRIPT_PROP.getProperty('key'));
    let sheet = doc.getSheetByName(SHEET_NAME);

    if (!sheet) {
      sheet = doc.insertSheet(SHEET_NAME);
    }

    // Header columns
    if (sheet.getLastRow() === 0) {
      sheet.appendRow(['Timestamp', 'Nama', 'Email', 'WhatsApp', 'Level', 'Pembayaran']);
      sheet.getRange(1, 1, 1, 6).setFontWeight('bold');
    }

    // Parse incoming data
    let rowData;
    try {
      const eventData = e.postData.contents;
      const params = JSON.parse(eventData);
      rowData = [
        new Date(),
        params.nama || '',
        params.email || '',
        params.whatsapp || '',
        params.level || '',
        params.payment || 'Belum dipilih'
      ];
    } catch (parseError) {
      // Fallback: parse as form data
      const formData = e.parameter;
      rowData = [
        new Date(),
        formData.nama || '',
        formData.email || '',
        formData.whatsapp || '',
        formData.level || '',
        formData.payment || 'Belum dipilih'
      ];
    }

    sheet.appendRow(rowData);

    return ContentService.createTextOutput(JSON.stringify({
      'result': 'success',
      'message': 'Data saved',
      'row': rowData
    })).setMimeType(ContentService.MimeType.JSON);

  } catch (error) {
    return ContentService.createTextOutput(JSON.stringify({
      'result': 'error',
      'error': error.toString()
    })).setMimeType(ContentService.MimeType.JSON);
  } finally {
    lock.releaseLock();
  }
}

function doGet(e) {
  return ContentService.createTextOutput('FNC Google Apps Script is running. Send POST request to submit data.');
}
