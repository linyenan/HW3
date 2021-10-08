$('a.delete').click(function (event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    //取得選定刪除的購物車索引
    let index = $(this).attr('data-index');

    $.get("deleteItem.php", { index: index }, function (obj) {
        if (obj['success']) {
            location.reload();
        } else {
            alert(`${obj['info']}`);
        }
        console.log(obj);
    }, 'json');
});