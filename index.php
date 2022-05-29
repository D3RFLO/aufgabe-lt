<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessingtiede</title>


    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet/less" href="/css/style.less">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="box">
                <form class="form" id="registration-form">

                    <div class="form-element">
                        <select required class="form-element-field" name="salutation">
                            <option value="" disabled selected>Anrede</option>
                            <option value="male">Herr</option>
                            <option value="female">Frau</option>
                            <option value="diverse">Divers</option>
                        </select>
                    </div>

                    <div class="form-element">
                        <input  class="form-element-field" type="text" name="firstname" placeholder="Vorname">
                    </div>

                    <div class="form-element">
                        <input required class="form-element-field" type="text" name="lastname" placeholder="Nachname" />
                    </div>

                    <div class="form-element">
                        <input required class="form-element-field" type="email" name="email" placeholder="E-Mail" />
                    </div>

                    <div class="form-element">
                        <input required class="form-element-field" type="text" name="haircolor" placeholder="Haarfarbe" />
                    </div>

                    <div class="form-element">
                        <select required class="form-element-field" name="birthyear">
                            <option value="" disabled selected>Geburtsjahr</option>
                            <?php
                            $birthYears = range(date('Y'), date('Y') - 100);

                            foreach ($birthYears as $key => $year) {
                                echo '<option value="' . $year . '">' . $year . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-element">
                        <input required class="form-element-field" type="password" name="password" placeholder="Passwort" />
                    </div>

                    <div class="form-element">
                        <textarea required rows="5" maxlength="99999" class="form-element-field" name="message" placeholder="Nachricht"></textarea>
                        <small class="form-element-hint"><span class="character-count">0</span>/10000 Zeichen</small>
                    </div>

                    <div class="form-element">
                        <button class="form-element-field btn" type="submit"><span class="text">Senden</span></button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>