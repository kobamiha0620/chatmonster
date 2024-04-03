$(window).on('load', function () { //ページが読み込まれた時に実行
    //各種共通、リンクデータの取得
    var ua = navigator.userAgent;


    if (ua.indexOf('iPhone') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)) {
        // スマホ用の処理

        // クリック回数によって動作を分岐
        console.log('SPだよ');
        let deviceLinkSp = document.getElementsByClassName('device__link');

        for (let i = 0; i < deviceLinkSp.length; i++) {
            let splink = deviceLinkSp[i].dataset.link;

            deviceLinkSp[i].addEventListener('click', function () {
                if(deviceLinkSp[i].classList.contains('changeImage')){
                    deviceLinkSp[i].setAttribute("href", splink);

                }else{
                    this.classList.add('changeImage');

                }

            });
        }


    } else {
        // PC用の処理

        let deviceLink = document.getElementsByClassName('device__link');
        for (let i = 0; i < deviceLink.length; i++) {
            let pclink = deviceLink[i].dataset.link;
            deviceLink[i].addEventListener('click', function () {
                deviceLink[i].setAttribute("href", pclink);
            });
        }
        console.log('PCだよ');

    }
});