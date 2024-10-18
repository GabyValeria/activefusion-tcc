window.addEventListener('scroll', function() {
    const nav = document.querySelector('nav');
    if (window.scrollY > 0) {
        nav.classList.add('nav--fixed'); // Adiciona a classe ao rolar
    } else {
        nav.classList.remove('nav--fixed'); // Remove a classe ao voltar ao topo
    }
});


function validateForm() {
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmar_senha').value;

    if (senha !== confirmarSenha) {
        alert('As senhas não coincidem.');
        return false;
    }

    return true;
}