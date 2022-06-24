function genereteQR(){
    let googleApi = 'https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl=';
    let data = Date();
    let conteudo = googleApi + data;
    document.getElementById('qrcode').src = conteudo;
}

