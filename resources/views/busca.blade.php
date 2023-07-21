<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-PJsj/BTMqILvmcej7ulplguok8ag4xFTPryRq8xevL7eBYSmpXKcbNVuy+P0RMgq" crossorigin="anonymous">


    <title>Hell</title>
</head>
<body>
<nav class="navbar bg-body-tertiary p-4">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1"></span>
    </div>
</nav>
<div class="container d-flex justify-content-center items-align-center">
    <form action="{{ route('searchZip') }}" method="GET" class="bg-dark-subtle p-4 mt-5" >
        <h1 class="fw-bold text-center py-2 ">Forms</h1>
        <div class="mb-3">
            <label for="InputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="InputEmail" name="InputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="row">
            <div class="col-6 mb-3">
                <label for="InputFirstName" class="form-label">First Name</label>
                <input type="text" aria-label="First name" class="form-control" id="InputFirstName" name="InputFirstName">
            </div>
            <div class="col-6 mb-3">
                <label for="InputLastName" class="form-label">Last Name</label>
                <input type="text" aria-label="Last name" class="form-control" id="InputLastName" name="InputLastName">
            </div>
        </div>
        <div class="mb-3">
            <label for="InputZip" class="form-label">Zip</label>
            <input type="text" aria-label="Zip" class="form-control" id="InputZip" name="InputZip">
        </div>
        <div class="mb-3">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" aria-label="Address" class="form-control" id="inputAddress" name="inputAddress">
        </div>
        <div class="row">
            <div class="col-6 mb-3">
                <label for="InputCity" class="form-label">City</label>
                <input type="text" aria-label="City" class="form-control" id="InputCity" name="InputCity">
            </div>
            <div class="col-6 mb-3">
                <label for="InputState" class="form-label">State</label>
                <input type="text" aria-label="State" class="form-control" id="InputState" name="InputState">
            </div>
        </div>
        <div class="btn-group d-flex justify-content-end">
            <button type="submit" class="btn btn-outline-success ">Submit</button>
            <button type="button" class="btn btn-outline-danger">Close</button>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>"
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#InputZip").keyup(function () {
            var cep = $(this).val().replace(/\D/g, '');
            if (cep.length === 8) {
                $.ajax({
                    url: "https://viacep.com.br/ws/" + cep + "/json/",
                    type: "GET",
                    success: function (data) {
                        if (data.erro) {
                            // mensagem de cep não encontrado
                            return;
                        }
                        $("#inputAddress").val(data.logradouro);
                        $("#InputCity").val(data.localidade);
                        $("#InputState").val(data.uf);
                    },
                    error: function () {
                        // mensagem de erro ao buscar o cep
                    }
                });
            }
        });
    });
</script>


</body>
</html>
