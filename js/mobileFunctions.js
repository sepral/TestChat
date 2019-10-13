var urlParams = new URLSearchParams(window.location.search);
console.log(urlParams.get('id_dialog'));
if ($(window).width() < 990) {
    $(document).ready(function () {
        if (urlParams.get('id_dialog') == null) {
            $(".dialogBlock").show();
            $(".chatBlock").hide();
        } else {
            $(".chatBlock").show();
            $(".sendBlock").show();
        }
    });
}