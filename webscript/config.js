var config = {
	"form-alert" : {
		"normal": "form-group",
		"error" : "form-group has-error",
		"success" : "form-group has-success",
		"warning": "form-group has-warning"
	},
	"button-submit": {
		"disabled": "btn btn-primary disabled",
		"enabled": "btn btn-primary enabled"
	},
	"password-rule":{
		"minlength": 4,
		"power": {
			"lowercase": 1,
			"minlength": 2,
			"uppercase": 4,
			"numeric": 4,
			"unique-char": 8
		},
		"password-strength": {
			"weak": 4,
			"medium": 8,
			"strong": 12,
			"very-strong": 16 
		}
	}
};
//list of required field in for
var form_config = {
	"pengajar/tambah": [
		"#username",
		"#name",
		"#password",
		"#email",
		"#phone"
	]
};
