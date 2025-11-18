<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balances</title>
    <link rel="stylesheet" href="css/estMenu.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estFooter.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.min.css">

</head>
<body>
    <?php include("encabezado.php"); include('menu.php');
    ?>

    <div >
        <form class="was-validated disabled">
            <div class="mb-3">
                <label for="validationTextarea" class="form-label">Textarea</label>
                <textarea class="form-control" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                <div class="invalid-feedback">
                Please enter a message in the textarea.
                </div>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="validationFormCheck1" required>
                <label class="form-check-label" for="validationFormCheck1">Check this checkbox</label>
                <div class="invalid-feedback">Example invalid feedback text</div>
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
                <label class="form-check-label" for="validationFormCheck2">Toggle this radio</label>
            </div>
            <div class="form-check mb-3">
                <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
                <label class="form-check-label" for="validationFormCheck3">Or toggle this other radio</label>
                <div class="invalid-feedback">More example invalid feedback text</div>
            </div>

            <div class="mb-3">
                <select class="form-select" required aria-label="select example">
                <option value="">Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                </select>
                <div class="invalid-feedback">Example invalid select feedback</div>
            </div>

            <div class="mb-3">
                <input type="file" class="form-control" aria-label="file example" required>
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit" disabled>Submit form</button>
            </div>
        </form>
    </div>
<?php include 'pie.php'; ?>
    
</body>
</html>