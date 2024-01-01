<?php
include "./crypto/index.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['encrypt'])) {
        $text = $_POST['inputText'];
        // echo "Teks yang dienkripsi: " . $text;

        $textEncrypt = vigenere_encrypt($text);
        $result = affine_encrypt($textEncrypt);
        // echo "Encrypt:: " . $result;
    } elseif (isset($_POST['decrypt'])) {
        $text = $_POST['inputText'];
        // echo "Teks yang didekripsi: " . $text;

        $textEncrypt = affine_decrypt($text);
        $result = vigenere_decrypt($textEncrypt);
        // echo "Decrypt:: " . $result;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <Link href="utilities/bootstrap.min.css" rel="stylesheet">
    <title>Kriptografi!</title>
</head>

<body>
    <div class="container">
        <div class="alert alert-info mt-4" role="alert">
            <h4>CRYPTOGRAFI::</h4>
            <h6>Note!</h6>
            <ol type="1">
                <li>Enter the text you want to encrypt or decrypt.</li>
                <li>Once you have entered the text, click the blue encrypt button or the red decrypt button.</li>
                <li>You will see the result in the result input form.</li>
                <li>Use the Clear button to clear both input forms.</li>
                <li>Thanks, good luck.</li>
            </ol>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <marquee behavior="scroll" direction="left">
                            <h4 class="text-center">COMBINATION ALGORITMA VIGENERE DAN AFFINE CIPHER</h4>
                        </marquee>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="needs-validation" method="post">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea class="form-control" id="text" rows="4" name="inputText" autofocus required></textarea>
                            </div>
                        </div>
                        <div class="col-md-2 text-center mt-5">
                            <button type="submit" class="btn btn-primary" name="encrypt">Encrypt</button>
                            <button type="submit" class="btn btn-danger" name="decrypt">Decrypt</button>
                            <div>
                                <button type="reset" class="btn btn-secondary mt-2">Clear</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="result" class="form-label">Result</label>
                                <textarea class="form-control" id="result" rows="4" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('result').value = '<?= isset($result) ? $result : ''; ?>';
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="utilities/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>