<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101300673067",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAq1XHXjerqekl5o9iEh3UFjHUf0veefSA1aRQM0HzryOpJJsImU0BhK+FEnCj8txMCSWu8B4dFGcgcU2TIj4XI03mUgB3hQyp692Is1jqhWHZa8ZC4IqACKbhWmb08e/kGiZf6QyJXECtemPMiAWeTpVf4K0nPMwHQ3ejEZKaYtqKmWdfHQEGOMEFaLn/rLvHZgI7EtMA5QFGcKMfyIg9BGPXxOdG8Ptte+OvpP6A6CE+SLP+J490HnDXdKj8/j+VCbZ9y3Zxb2BDWPDcPO8x7ZbEu26gIFQeU3q7vpSlcYbc8jRpKzDjDoPh8iENUIZ73ywbQgGzpt4u0g4vkjd51wIDAQABAoIBADMjijsz8JfpT/euKj5wCsKJIvzPv1q1QNMDlTCHad2Hjk+vunRPSLm6zcRAPJ8bY9KDHeDrjBBv634GAnmBANT3xlwJaaMbsYgF+mxViMJA/20sov90N1zdunuKKWghCvtHIu9jX4hagaz7JqweyS55ZUGhTQnXd/+KMPDoyg3g4aukz7SSPC/OVZb4BePHZ07ypcYnrZVUKBZg6wUB+teBl6IrZdDDyIGntZn09ShCMpsBJJVYYmd01Rxnhcj/TUMHmCp7LIGnK8w4FFGcfDv86XKbSeOHyjTapPwEMb6SVawdumhuoJY04EDYh8TjN3aUGq0d4AZ5imKIdRsyaSECgYEA3gDbWIo/F15D58CkKKX71xdLXywx61QMEOXLFufmzJReyXTM/KfUzM11iIGvr/qrE0DX1M6sMbl4RYH0Vmt6q4+x3pFc6mkwrdzSN7yIJmEe3AH/OEtGhC+XSwKN0Si6iLPzpuOe7zt9gQyhcodxy1PMjzJm8xB5941BxAWETLECgYEAxZKWAbZ/6TMBEc8DDGlzOFJ1NC1VdNQPRgZ6rZGOr+eKQZriBzl26hu4HmZmItndhR7sTbJ/JSIk8QzVKC7LX60tlSK8CDysISj9seTWNdqIMnApvFAakzVmsdXA/6v1lww6avWQmq0Q16C28VAg5TyHMrzLTd99UbDjZ/SDsQcCgYEA0j+3fIP5OnVhFDQihAimmM8L58egQ0Hm533pt/jKYUfG+T3wAPwlkgynWi+QJrbcnDBV98n/1FvVpuZrdAj4NVCyYJoEiFA09QPj5ztbKhXitvQBNNw9nWTBAR4bF1JeTqc2gwChfeo2cyh2IlRaFfl4CsnuLBaXnDYgabfb0xECgYAQ7Wk6xlcZNMx/qRvawWIkzjPKf6PVuaGBX2a9Xj46Zf0bd9irw8mjbzKMMDvJ+p6XHDokwglQticyG+ZbZf74uI6yO2Ke1gvtX2S1DCUqQgnvQFrjDn3oZOfijqzVevc0tNCAf3+fMPrDbrqd3D6lRVVUDIbiqiZDjIM/UdzCmwKBgAb5VtcYDVp2heNVpn/OE9n85H5sFB8tXlsbIcKCxfSwyZi2Gt11jK0iJA5lA3y4tetB/hr9UTWddAth773pBvq0YjvyejxqtDAF+MNbmCJXIXzrlhRqlk0SMS6BhPDbQglC1tWWd//KVHCR4vnd6GD5Eq5/C/5Hu4/BqRVivLRO",
		
		//异步通知地址
		'notify_url' => "http://h.com/alipay/notify_url.php",
		
		//同步跳转
		'return_url' => "http://h.com/alipay/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAh3R3mjT4POXkamREhbGCY5MwKmJDnGq5z2ldhI80Gk4VPZ+vGrD32AP08cemyMv7OIat4v/HeCmY5yHWNZWLvVxxIZSIWhDCuQrq6M9p5EtNkEQHwwNjEq5m8PN7A7EU7l5svvMJ7tlcY3onVWZjMnbtVaQTY5zYBtrgcp2Z2VkFSi0ZvDiKoh26Qyoc3MuCnqWMiuYhTQvkmnUTeVsihO37UMAea8Z2SBxr/5snfZYP4CNnKFr/S4bp7i+7GYehAmXSp6hlpxtDdPe8dRjLPO+Kp/J5vLRPPoN/QQr7RbDHnhMZ33kI4NJ/AcHGUrOdSBUr1IA9hvUhzOEr7rLZnwIDAQAB",
		
	
);