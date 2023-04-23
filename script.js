if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('./sw.js')
    .then(reg => console.log('Registro de AylluTanta exitoso.', reg))
    .catch(err => console.warn('Error al tratar de registrar AylluTanta.', err))
}