# swish-qr-php
Simple Swish QR Code generator with PHP

This plugin is made with simplicity to generate Swish QR codes. You can import it your projects or use it however you want.

### **[Click here for demo!](https://visend.se/swish.php?amount=20&message=YourCofeeForSwishPHP&payee=0705526118)**

You can scan the generated QR code to buy me a coffee.

---

The code is using GET method within these variables, for example:
You can change the GET method to whatever you want.

```php
$amount = $_GET["amount"]; // Amount you want to pay
$message = $_GET["message"]; // The message you want use
$payee = $_GET["payee"]; // Where the money goes to
```

The QR code will be generated as an JPG-image. You can choose between **JPG**, **PNG** or **SVG** by editing line 5:
```php
$format = 'jpg'; // Use jpg, png or svg
```

With this code, you can pass the data within your. Exmaple:
```
https://visend.se/swish.php?amount=20&message=YourCofeeForSwishPHP&payee=0705526118
```
