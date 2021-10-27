$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/**
 * function:
 *  1. to_slug(str) -> string to slug.
 *  2. addSlug() -> get string in #name convert to slug, put it to #slug
 ================================================================================
 */

/**
 * 1/
 * Function chuyển đổi chuỗi thành slug
 * @param str
 * @returns {*}
 */
function to_slug(str) {
    // Chuyển hết sang chữ thường
    str = str.toLowerCase();

    // xóa dấu
    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');

    // Xóa ký tự đặc biệt
    str = str.replace(/([^0-9a-z-\s])/g, '');

    // Xóa khoảng trắng thay bằng ký tự -
    str = str.replace(/(\s+)/g, '-');

    // xóa phần dự - ở đầu
    str = str.replace(/^-+/g, '');

    // xóa phần dư - ở cuối
    str = str.replace(/-+$/g, '');

    // return
    return str;
}

/**
 * 2/
 * Tự động lấy dữ liệu trong field có id là name chuyển sang cho field có id là slug
 * nếu có param là url là ajax đến đó kiểm tra sự tồn tại của slug trong model
 * @returns {boolean}
 */

function addSlug(url = '') {
    const name = $('#name')
    const slug = $('#slug');
    var slugValue = to_slug(name.val());
    if (url != '') {
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            url: url,
            data: {slugValue},
            success: function(result) {
                if (result.error) {
                    slug.val('') //fix bug người dùng tự gõ vào không check được
                    name.val('') //fix bug khi nhấn nút alert cứ hiện thông báo check slug
                    alert(result.message)
                } else {
                    slug.val(to_slug(name.val()))
                }
            }
        });
    } else {
        slug.val(to_slug(name.val()))
        return true
    }

}

/**
 * Hàm xoá 1 row với đầu vào là id và đường link gửi tới controller qua route
 * @param id
 * @param url
 */
function deleteRow(id = 0, url)
{
    if (confirm('Xoá không thể khôi phục, bạn có chắc chắn muốn xoá?')) {
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            url: url,
            data: id,
            success: function(result) {
               if(result.error) {

                   alert('Xoá thất bại: ' + result.message)
               } else {

                   //Xoá thành công thì reload lại trang
                   location.reload();
               }
            }

        });
    }
}

{
    $('#upload').change(function() {
        const form = new FormData();
        form.append('file', ($(this)[0].files[0]));
        $.ajax({
            processData: false,
            contentType: false,
            type: 'post',
            dataType: 'JSON',
            url: '/admin/upload/store',
            data: form,
            success: function(result) {
                if (result.error) {
                    alert('Có lỗi: ' + result.message)
                } else {
                    alert('Tải ảnh thành công: ' + result.path)
                    $("#url_file").val(result.path);
                    const html =
                        '<a href="' + result.path + '" target="_blank"><img src="' + result.path + '" width="300px"></a>';
                    $("#thumb").html(html);
                }
            }
        })
    })
}

function showPrice()
{
    var vnd = {
        style: "currency",
        currency: "VND",
        currencyDisplay: "symbol"
    }
    let elementInput = this.event.target;
    let parent = elementInput.parentElement;
    let getSpanNumberFormat = parent.querySelector('.display_price');
    let getSpanReadNumber = parent.querySelector('.display_price_text');
    let num = parseInt(parent.querySelector('.priceInput').value);

    if (num > 0 && num != null) {
        getSpanNumberFormat.innerText = num.toLocaleString(undefined, vnd);
        var text = '';
        var temp = 0;
        if (num > 999999) {
            temp = Math.round(num / 1000000)
            text += temp + ' triệu '
        }
        if (num > 99999) {
            temp = num % 1000000
            temp = Math.floor(temp / 100000)
            if (temp > 0)
            text += temp + ' trăm '
        }
        if (num > 999) {
            temp = num % 100000
            temp = Math.floor(temp / 1000)
            if (temp > 0)
            text += temp + ' nghìn '
        }
        text += num % 1000 + ' đồng.'
        getSpanReadNumber.innerText = '(Bằng chữ: ' + text + ')';
    } else {
        getSpanNumberFormat.innerText = '';
        getSpanReadNumber.innerText = '(Bằng chữ: ' + '0 đ' + ')';
    }

}

