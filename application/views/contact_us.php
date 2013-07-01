<!doctype html>
<html>
<head>
<title>Contact us</title>
<style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
</head>
<body>
<div id="wrapper">
<div id="container">
<div class="contact-form">
<div class="contact-field">
<h4>Contact Us</h4><br />
<form action="" method="get">
<label>Name:</label><input type="text" required name="name" value="Enter your name" onfocus="if (this.value == 'Enter your name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your name';}" />
 <label>Email:</label><input type="email" required name="email" value="mentors@sample.com" onfocus="if (this.value == 'mentors@sample.com') {this.value = '';}" onblur="if (this.value == '') {this.value = 'mentors@sample.com';}" /><br />
 <label>Comment:</label><textarea rows="6" cols="22" name="comment" required  placeholder="type your message here" onfocus="if (this.placeholder == 'type your message here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'type your message here';}"></textarea>
 <button class="contact-submit" name="submit" type="submit">Submit</button>
</form>
</div>
</div>
</div>
</body>
</html>