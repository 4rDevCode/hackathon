function scrollToSection() {
    const seccionDestino = document.getElementById('sobreAllyu');
    console.log(seccionDestino.offsetTop);
    window.scrollTo({
      top: seccionDestino.offsetTop,
      behavior: 'smooth' 
    });
  }
  function scrollToSection2() {
    const seccionDestino = document.getElementById('Acciones');
    console.log(seccionDestino.offsetTop);
    window.scrollTo({
    
      top: seccionDestino.offsetTop,
      behavior: 'smooth' 
    });
  }
 