<!DOCTYPE html>
<html>

<head>
 <style>
  body {
   font-family: Arial, sans-serif;
   background-color: #f9f9f9;
   padding: 20px;
  }

  .container {
   background-color: #fff;
   padding: 20px;
   border-radius: 8px;
  }

  h2 {
   color: #333;
  }

  p {
   font-size: 16px;
   color: #555;
  }

  .status {
   font-weight: bold;
   color: #007bff;
   text-decoration: none;
  }

  .footer {
   margin-top: 20px;
   font-size: 14px;
   color: #999;
  }
 </style>
</head>

<body>
 <div class="container">
  <h2>Dear Admin,</h2>
  <p>You have a new job application .</p>
  <a class="status" href="<?= $url ?>">Click Here</a> to view the jobseeker profile.
  <div class="footer">
   <p>Regards,<br>Octagon Careers Team</p>
  </div>
 </div>
</body>

</html>