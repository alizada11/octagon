<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->

    <title>Application for Employment</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {

            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #FFF;
            color: #000;
            padding: 10px 30px;
            text-align: center;
            position: relative;
        }



        .header .logo-right {
            width: 144px;
            height: auto;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
        }

        .header .ref {
            font-size: 14px;
            margin-top: 5px;
        }

        .section {
            margin: 20px;
        }

        .section h3 {
            color: #000;
            padding: 5px;
            margin: 0;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table td {
            padding: 10px;
            border: 1px solid #4a2c2a;
            text-align: center;
        }

        .details-table td:first-child {
            /* background-color: #4a2c2a; */
            /* color: #fff; */
            width: 30%;
        }

        .details-table td:nth-child(2) {
            width: 40%;
        }

        .details-table td:last-child {
            /* background-color: #4a2c2a; */
            /* color: #fff; */
            width: 30%;
        }

        .photo {
            width: 100px;
            height: 120px;
            background-color: #ccc;
            float: left;
            margin-right: 20px;
        }

        .footer img {
            width: 100%;
        }

        .language-table td {
            text-align: center;
        }

        .language-table td input {
            margin: 0 5px;
        }

        .cv_header,
        .footer {
            width: 100%;
        }

        .cv_header img,
        .footer img {
            width: 100%;
        }

        .header {
            display: flex;
            align-items: center;
        }

        .prof_img {
            width: 20%;

        }

        .prof_img img {
            width: 100%;
        }

        .req_det {
            width: 80%;
        }

        .header .req_det h4 {
            margin: 5px;
        }

        .req_det div {
            margin-left: 1.5rem;
            display: flex;
            justify-content: space-between;
            border: 1px solid #47001F;
            margin-bottom: 5px;
            border-radius: 5px;

        }

        .req_det div span.nbg {
            color: #000;
        }

        .req_det div span.end {
            text-align: left;
            display: flex;
            justify-content: flex-end;
            direction: rtl;
        }

        .req_det div span.start {
            display: flex;
        }

        .req_det div span.start,
        .req_det div span.end {
            color: white;
            align-items: center;
            background-color: #47001F;
        }

        .req_det div span {
            width: 90%;
            border-radius: 5px;
            padding: 5px;
        }

        .det_header {
            display: flex;
            justify-content: space-between;
            background-color: #47001F;
            color: #FFF;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            margin-top: 1rem;
        }

        .det_header h4 {
            margin: 0;
        }

        .arabic {
            direction: rtl;
            /* Apply RTL for Arabic text */
            unicode-bidi: embed;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="cv_header">
            <img src="<?= $cvHeaderSrc ?>" width="100%">
        </div>

        <table class="header" style="width: 100%;">
            <tr>
                <td style="width: 30%; text-align: left; ">
                    <div style="width: 20%;">
                        <img src="<?= $profilePhotoSrc ?>" width="200px" class="logo-right">
                    </div>
                </td>
                <td style="width: 80%; text-align: center; ">
                    <div class="req_det text-end" style=" display: flex; justify-content:space-between; flex-direction:column; width: 80%;">

                        <h4>APPLICATION FOR EMPLOYMENT</h4>
                        <h4> استماره طلب عمل</h4>



                        <table class="details-table">
                            <tr>
                                <td style="background-color: #47001F; color:white;">Full Name</td>
                                <td><?= $profile['full_name'] ?? 'N/A' ?></td>
                                <td class="arabic" style="background-color: #47001F; color:white;">الاسم الکامل </td>
                            </tr>
                            <tr>
                                <td style="background-color: #47001F; color:white;">Email</td>
                                <td><?= $user['email'] ?? 'N/A' ?></td>
                                <td class="arabic" style="background-color: #47001F; color:white;"> بريد إلكتروني </td>
                            </tr>
                            <tr>
                                <td style="background-color: #47001F; color:white;">Phone</td>
                                <td><?= $profile['country_code'] . $profile['phone'] ?? 'N/A' ?></td>
                                <td class="arabic" style="background-color: #47001F; color:white;">هاتف</td>
                            </tr>

                        </table>
                    </div>
                </td>
            </tr>
        </table>
        <div class=" section">
            <div style=" border-radius: 12px 12px 0 0 ; overflow: hidden;">
                <table class="det_header" style="width: 100%; ">
                    <tr>
                        <td style="width: 50%; text-align: left; ">
                            <h4>PASSPORT DETAILS</h4>
                        </td>
                        <td style="width: 50%; text-align: right; ">
                            <h4 class="arabic">تفاصيل جواز السفر</h4>
                        </td>
                    </tr>
                </table>
                <table class="details-table">
                    <tr>
                        <td>Number</td>
                        <td><?= $passports['number'] ?? 'N/A' ?></td>
                        <td class="arabic">رقم</td>
                    </tr>
                    <tr>
                        <td>Date of Issue</td>
                        <td><?= $passports['date_of_issue'] ?? 'N/A' ?></td>
                        <td class="arabic">تاريخ الإصدار</td>
                    </tr>
                    <tr>
                        <td>Place of Issue</td>
                        <td><?= $passports['place_of_issue'] ?? 'N/A' ?></td>
                        <td class="arabic">مكان الإصدار</td>
                    </tr>
                    <tr>
                        <td>Date of Expiry</td>
                        <td><?= $passports['date_of_expiry'] ?? 'N/A' ?></td>
                        <td class="arabic">تاريخ الانتهاء</td>
                    </tr>
                </table>
            </div>
            <table class="det_header" style="width: 100%;">
                <tr>
                    <td style="width: 50%; text-align: left; ">
                        <h4>DETAILS OF APPLICATION</h4>
                    </td>
                    <td style="width: 50%; text-align: right; ">
                        <h4 class="arabic">تفاصيل الطلب</h4>
                    </td>
                </tr>
            </table>
            <table class="details-table">
                <tr>
                    <td>Nationality</td>
                    <td><?= $profile['nationality'] ?></td>
                    <td class="arabic">الجنسية</td>
                </tr>
                <tr>
                    <td>Religion</td>
                    <td><?= $profile['religion'] ?></td>
                    <td class="arabic">دين</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><?= $profile['dob']; ?></td>
                    <td class="arabic">تاريخ الميلاد</td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td><?php
                        $dob = $profile['dob']; // Test with a known date
                        $dobObject = new \DateTime($dob);
                        $now = new \DateTime();
                        $age = $dobObject->diff($now)->y;

                        echo $age; // should return 35 (as of May 2025)

                        ?></td>
                    <td class="arabic">عمر</td>
                </tr>
                <tr>
                    <td>Place of Birth</td>
                    <td><?= $profile['place_of_birth'] ?></td>
                    <td class="arabic">مكان الميلاد</td>

                </tr>
                <tr>
                    <td>Living Town</td>
                    <td><?= $profile['living_town'] ?></td>
                    <td class="arabic">مكان الإقامة</td>
                </tr>
                <tr>
                    <td>Marital Status</td>
                    <td><?= $profile['marital_status'] ?></td>
                    <td class="arabic">الحالة الاجتماعية</td>
                </tr>
                <tr>
                    <td>No#of Children</td>
                    <td><?= $profile['no_of_children'] ?></td>
                    <td class="arabic">عدد الأطفال</td>
                </tr>
                <tr>
                    <td>Weight</td>
                    <td><?= $profile['weight'] ?></td>
                    <td class="arabic">وزن</td>
                </tr>
                <tr>
                    <td>Height</td>
                    <td><?= $profile['height'] ?> CM</td>
                    <td class="arabic">ارتفاع</td>
                </tr>
                <tr>
                    <td>Complexion</td>
                    <td><?= $profile['complexion'] ?></td>
                    <td class="arabic">بشرة</td>
                </tr>

            </table>
            <table class="det_header" style="width: 100%;">
                <tr>
                    <td style="width: 50%; text-align: left; ">
                        <h4>EDUCATIONSS</h4>
                    </td>
                    <td style="width: 50%; text-align: right; ">
                        <h4 class="arabic">العلم </h4>
                    </td>
                </tr>
            </table>
            <table class="details-table language-table">
                <tr style="background-color: #eee; font-weight:bold;">
                    <td>Institution </td>
                    <td>Field of study </td>
                    <td>Degree </td>
                    <td>Start year </td>
                    <td>End year </td>


                </tr>
                <?php foreach ($educations as $edu): ?>
                    <tr>
                        <td><?= $edu['institution'] ?></td>
                        <td><?= $edu['field_of_study'] ?></td>
                        <td><?= $edu['degree'] ?></td>
                        <td><?= $edu['start_year'] ?></td>
                        <td><?= $edu['end_year'] ?></td>


                    </tr>
                <?php endforeach; ?>
            </table>
            <table class="det_header" style="width: 100%;">
                <tr>
                    <td style="width: 50%; text-align: left; ">
                        <h4>KNOWLEDGE OF LANGUAGES</h4>
                    </td>
                    <td style="width: 50%; text-align: right; ">
                        <h4 class="arabic">معرفة اللغات</h4>
                    </td>
                </tr>
            </table>
            <table class="details-table language-table">
                <tr style="background-color: #eee; font-weight:bold;">
                    <td>Language</td>
                    <td>Level </td>

                </tr>
                <?php foreach ($languages as $lang): ?>
                    <tr>
                        <td style="width: 40%;"><?= $lang['language'] ?></td>
                        <td style="width: 60%;">
                            <?= ($lang['proficiency'] == 'Basic') ? '&#x2611;' : '&#x2610;' ?> Basic &nbsp;
                            <?= ($lang['proficiency'] == 'Intermediate') ? '&#x2611;' : '&#x2610;' ?> Intermediate &nbsp;
                            <?= ($lang['proficiency'] == 'Fluent') ? '&#x2611;' : '&#x2610;' ?> Fluent &nbsp;
                            <?= ($lang['proficiency'] == 'Native') ? '&#x2611;' : '&#x2610;' ?> Native
                        </td>


                    </tr>
                <?php endforeach; ?>
            </table>
            <table class="det_header" style="width: 100%;">
                <tr>
                    <td style="width: 50%; text-align: left; ">
                        <h4>WORKING EXPERIENCE</h4>
                    </td>
                    <td style="width: 50%; text-align: right; ">
                        <h4 class="arabic">الخبرة العملية</h4>
                    </td>
                </tr>
            </table>
            <table class="details-table">
                <tr style="background-color:#eee; font-weight:bold;">

                    <td>Company name</td>
                    <td>Job title</td>
                    <td>Years of experience</td>
                </tr>
                <?php foreach ($experiences as $exp): ?>
                    <tr>
                        <td><?= $exp['company_name'] ?></td>
                        <td><?= $exp['job_title'] ?></td>
                        <td><?php

                            $dobObject = new \DateTime($exp['start_date']);
                            $now = new \DateTime($exp['end_date']);
                            $years = $dobObject->diff($now)->y;

                            echo $years; // should return 35 (as of May 2025)

                            ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <table class="det_header" style="width: 100%;">
                <tr>
                    <td style="width: 50%; text-align: left; ">
                        <h4>Skills</h4>
                    </td>
                    <td style="width: 50%; text-align: right; ">
                        <h4 class="arabic"> مهارت</h4>
                    </td>
                </tr>
            </table>
            <table class="details-table">
                <tr style="background-color: #eee; font-weight:bold;">
                    <td>Skill name</td>
                    <td>Level</td>

                </tr>
                <?php foreach ($skills as $skill): ?>
                    <tr>
                        <td><?= $skill['skill_name'] ?></td>
                        <td><?= $skill['level'] ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div style="width:100%; text-align:center;">
            <em>Generated by: <a href="www.octagon.om">Octagon.om</a></em>
        </div>
        <div class="footer">
            <img src="<?= $cvFooterSrc ?>" width="100%">
        </div>
    </div>
</body>
</body>

</html>

</html>