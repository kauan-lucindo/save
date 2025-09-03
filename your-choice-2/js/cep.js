'use strict';

const limparForm = (endereco) => {

    document.getElementById('endereco').value = '';
    document.getElementById('bairro').value = '';
    document.getElementById('cidade').value = '';
    document.getElementById('estado').value = '';
    document.getElementById('numero').value = '';
    document.getElementById('erros').style.display = 'none'


}


const preencherFormulario = (endereco) => {

    document.getElementById('endereco').value = endereco.logradouro;
    document.getElementById('bairro').value = endereco.bairro;
    document.getElementById('cidade').value = endereco.localidade;
    document.getElementById('estado').value = endereco.uf;


}

const isNumber = (numero) => /^[0-9]+$/.test(numero);

const cepValido = (cep) => cep.length == 8 && isNumber(cep);

const pesquiserCep = async () => {
    limparForm()

    const cep = document.getElementById('cep').value;
    const urlCep = `https://viacep.com.br/ws/${cep}/json`;
    if (cepValido(cep)) {
        const dados = await fetch(urlCep);
        const endereco = await dados.json();

        if (endereco.hasOwnProperty('erro')) {
            document.getElementById('erros').style.display = 'block'
            erro1.style.animation = "none";
            setTimeout(() => { erro1.style.animation = "shake 0.5s ease-in-out"; }, 10);
            // document.getElementById('cep').value = ''
        } else {
            preencherFormulario(endereco);
        }

    } else {

        document.getElementById('erros').style.display = 'block'
        
        erro1.style.animation = "none";
        setTimeout(() => { erro1.style.animation = "shake 0.5s ease-in-out"; }, 10);
        // document.getElementById('cep').value = ''

    }



}

document.getElementById('cep').addEventListener('focusout', pesquiserCep)
