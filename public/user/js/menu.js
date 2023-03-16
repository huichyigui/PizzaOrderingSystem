$(document).ready(function () {

    $("#category a").click(function (e){
        $value = $("select[name=category]").val();

        $href = $(this).attr('href');
        $content = $href.split("/");
        $content[5] = $value;
        console.log($content);

        if (!$content[4]) {
            $content[4] = 'Latest';
        }

        $href = "";
        $content.forEach(str => {
            $href += str + '/';
        });

        console.log($href);
        $(this).attr('href', $href);
        // e.preventDefault();
    })

    $("#search a").click(function (e){
        $value = $("input[name=search]").val();

        $href = $(this).attr('href');
        $content = $href.split("/");
        $content[6] = $value;
        console.log($content);

        if (!$content[4]) {
            $content[4] = 'Latest';
        }

        if (!$content[5]) {
            $content[5] = 'Any';
        }

        $href = "";
        $content.forEach(str => {
            $href += str + '/';
        });

        console.log($href);
        $(this).attr('href', $href);
        window.location.href = $href;
        // e.preventDefault();
    })

    $("input[name=search]").keypress(function (e) {
        if (e.keyCode == 13) {
            $href = $("#search a").click();
        }
    })

});
