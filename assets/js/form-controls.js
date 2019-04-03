var FormControls = {
	init: function () {
		$("#infoForm").validate({
			rules: {
				zipcode: {
					required: !0
				},
				address: {
					required: !0
				},
				name: {
					required: !0
				},
				email: {
					required: !0,
					email: !0
				}
            },
            messages: {
                zipcode: "郵便番号は必須項目です。",
                address: "住所は必須項目です。",
                name: "氏名は必須項目です。",
                email: {
                    required: "メアドは必須項目です。",
                    email: "メアドの入力形式が正しくありません。"
                }
            },
			invalidHandler: function (e, r) {
			},
			submitHandler: function (e) {
				return true;
            }
		})
	}
};
jQuery(document).ready(function () {
	FormControls.init()
});
