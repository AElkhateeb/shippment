function add_icon(icon) {
    var i = '<i class="fa '+document.getElementById(icon).value+'" style="font-size: 32px; color:#41b883"></i>';
    jQuery('#label_icon').html(i);
}
