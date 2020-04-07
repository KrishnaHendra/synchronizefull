<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ticket</title>
</head>
<body>
    <table class="table table-bordered"> 
        <tr class="text-center"><td colspan="2"><b>OhNais! Festival</b></td></tr>
        <tr>
            <td rowspan="2" class="text-center mt-3"><img src="assets/poster.jpg" alt="" width="450px" height="250px"></td>
            <td class="text-center mt-5 pt-2" style="height:50px !important;"><img src="assets/syn.jpg" alt="" width="120px"></td>
            
        </tr>
        <?php foreach($tiket as $t): ?>
        <tr>
        <td class="text-center"><img class="img" src="assets/image.png" alt="" height="120px" width="160px;"><br><?= $t['qty'] ?> Ticket</td>
        </tr>
        <tr>
        <td class="text-center" style="font-size:13.5px;">
        <b>
            OH-NAIS FEST : EPISODE WAYTUBER <br>
            21 FEB 2020 14:00 - 23.00 <br>
            GRAHA CAKRAWALA, JL. AMBARAWA No.5, SUMBERSARI, KEC. <br>
            LOWOKWARU, KOTA MALANG, JAWA TIMUR 65145, INDONESIA <br>
            LOKET HEADQUARTER
            </b>
        </td>
        <td class="text-center" style="font-size:13.5px;">
                
                <b>OA<?= time() ?> <br>
                <?= $t['nama_user'] ?><br></b>
                Ordered on <?= date('d M Y',$t['tanggal']) ?> <br>
                <?php endforeach; ?>
                Ref : Online
            
        </td>
        </tr>
        <tr>
        <td colspan="2" class="text-center text-danger">TERM & CONDITIONS
        </td>
        </tr>
        <tr>
        <td>
            <b>- Proof of ID is a requirement for every ticket purchased</b><br>
            Wajib menunjukkan kartu identitas untuk setiap pembelian tiket
        </td>
        <td>
        <b>- No weapon & no drugs</b><br>
        Dilarang membawa senjata atau obat-obatan
        </td>
        </tr>
    </table>
</body>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>