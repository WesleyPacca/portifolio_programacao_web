<?php include('layouts/header.php'); ?>
    <body>
        <div class="d-flex vh-100">
            <div class="container my-auto">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form id="signo-form" method="POST"
                        action="show_zodiac_sign.php" class="card p-4 shadow">
                            <h4 class="text-center mb-4">Descubra seu signo:</h4>
                            <div class="mb-3">
                                <label for="data_nascimento" class="form-label">Data de nascimento</label>
                                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary"
                                >Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>