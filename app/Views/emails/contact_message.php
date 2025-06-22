<!DOCTYPE html>
<html>

<head>
 <meta charset="UTF-8">
 <title>New Contact Submission</title>
 <style>
  body {
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   background-color: #f1f1f1;
   padding: 20px;
   margin: 0;
  }

  .container {
   background-color: #ffffff;
   padding: 30px 25px;
   border-radius: 20px;
   max-width: 600px;
   margin: auto;
   box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
   border: 1px solid #e0e0e0;
  }

  h2 {
   color: #2c3e50;
   margin-bottom: 25px;
   font-size: 22px;
   text-align: center;
   border-bottom: 1px solid #ddd;
   padding-bottom: 10px;
  }

  .field {
   margin-bottom: 18px;
   padding-bottom: 10px;
   border-bottom: 1px solid #f0f0f0;
  }

  .label {
   font-weight: 600;
   color: #34495e;
   display: block;
   margin-bottom: 5px;
   font-size: 15px;
  }

  .value {
   color: #555;
   font-size: 14px;
   line-height: 1.5;
  }

  @media only screen and (max-width: 600px) {
   .container {
    padding: 20px 15px;
   }

   h2 {
    font-size: 20px;
   }
  }
 </style>
</head>

<body>
 <div class="container">
  <h2>New Contact Form Submission</h2>

  <div class="field">
   <div class="label">Name:</div>
   <div class="value"><?= esc($name) ?></div>
  </div>

  <div class="field">
   <div class="label">Email:</div>
   <div class="value"><?= esc($email) ?></div>
  </div>

  <div class="field">
   <div class="label">Phone:</div>
   <div class="value"><?= esc($phone) ?></div>
  </div>

  <div class="field">
   <div class="label">Service:</div>
   <div class="value"><?= esc($service) ?></div>
  </div>

  <div class="field">
   <div class="label">Message:</div>
   <div class="value"><?= nl2br(esc($message)) ?></div>
  </div>

 </div>
</body>

</html>