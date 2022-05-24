<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <title>Лаб 1</title>
    <link href="css\mlidm.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,900&display=swap&subset=cyrillic" rel="stylesheet">
</head>
<body>

    <form>
        <div class="communication">
            <div class="icon"><a href="https://vk.com/mmidavv"><img src="img\vk.png"></a></div>
            <div class="icon"><a href="https://steamcommunity.com/profiles/76561198212435000/"><img src="img\Steam.png"></a></div>
            <div class="icon"><a href="https://www.instagram.com/mmidavv/?hl=ru"><img src="img\instagram.png"></a></div>
            <div class="registration right">
                <?php 
                if($_COOKIE['user'] == ''):
                ?>
                <a href="registration.php">
                    Регистрация/авторизация
                </a>
                <?php else: ?>
                <a href="profile.php"><?=$_COOKIE['user']?>(Нажмите, чтобы зайти в свой профиль)</a>
                <?php endif;?>
            </div>
        </div>
        <div class="head">
                <div class="section">MySite</div>
                <div class="section right"><img src="img\mountains.png"></div>
                <div class="section right"><a href="mlidm.php">МЛиДМ</a></div>
                <div class="section right"><a href="cat.php">Мой кот</a></div>
                <div class="section right"><a href="gallery.php">Мои фото</a></div>
                <div class="section right"><a href="info.php">О себе</a></div>
                <div class="section right"><a href="index.php">Главное меню</a></div>
        </div>
        <table>
            <tr>
                <td>Первый массив</td>
                <td><input type="text" id="arr1" /> </td>
            </tr>
            <tr>
                <td>Второй массив</td>
                <td><input type="text" id="arr2" /> </td>
            </tr>
            <tr>
                <td colspan="2"> <input type="button" value="Рассчитать" onclick="rasschet();"/>
            </tr>
            
        </table>
    </form>
    <p id="outResult"></p>
    <script>
        var arr1, arr2, error;

        function count(arr, el) {
            let c = 0;
            for(let i=0; i<arr.length; i++)
                if( arr[i] == el)
                    c++;
            return c;
        }

        function check(str){
            let arr = false;
            if(str.length>0){
                arr = str.split(" ");
                for(let i=0; i< arr.length; i++){
                    if (count(arr, arr[i]) > 1){
                        arr.splice(i, 1);
                        i--;
                    }
                }

                for(let i=0; i< arr.length; i++) {

                    if (arr[i][0] <'a' || arr[i][0] > 'z') {
                        error = "Ошибка при вводе массива\n" + str + " В элементе " + arr[i];
                        error += "\nДолжна быть введена буква";
                        error += "\nИсправьте 1 элемент (" + arr[i][0] + ")";
                        arr = false;
                        break;
                    }
                    if (arr[i][1] % 2 != 1) {
                        error = "Ошибка при вводе массива\n" + str + " В элементе " + arr[i];
                        error += "\nДолжна быть введена чётная цифра";
                        error += "\nИсправьте 2 элемент (" + arr[i][1] + ")";
                        arr = false;
                        break;
                    }
                    if (arr[i][2] < 1 || arr[i][0] > 9) {
                        error = "Ошибка при вводе массива\n" + str + " В элементе " + arr[i];
                        error += "\nДолжна быть введена цифра";
                        error += "\nИсправьте 3 элемент (" + arr[i][2] + ")";
                        arr = false;
                        break;
                    }
                    if (arr[i][3] % 2 != 0) {
                        error = "Ошибка при вводе массива\n" + str + " В элементе " + arr[i];
                        error += "\nДолжна быть введена чётная цифра";
                        error += "\nИсправьте 4 элемент (" + arr[i][3] + ")";
                        arr = false;
                        break;
                    }
                }
            }
            else{
                error = "Массив не должен быть пустым";
            }
            return arr;
        }
        function unification(arr1, arr2){
            let result = "";
            for(let i=0; i<arr1.length; i++){
                result += arr1[i] +" ";
            }
            for(let i=0; i<arr2.length; i++){
                if(arr1.indexOf(arr2[i]) == -1){
                    result += arr2[i] + " ";
                }
            }
            return result;
        }
        function intersection(arr1, arr2){
            let result = "";
            for(let i=0; i<arr2.length; i++){
                if(arr1.indexOf(arr2[i]) != -1){
                    result += arr2[i] + " ";
                }
            }
            return result;
        }
        function addition(arr1,arr2){
            let result= "";
            for(let i=0; i<arr1.length; i++){
                if(arr2.indexOf(arr1[i]) == -1){
                    result += arr1[i] + " ";
                }
            }
            return result;
        }
        function SymmetricDifference(arr1,arr2){
            let result= "";
            result = addition(arr1,arr2) +" " + addition(arr2,arr1);
            return result;
        }
        function rasschet() {
            let result = "";
            var errorarr1 = document.getElementById('arr1');
            var errorarr2 = document.getElementById('arr2');
            if ((arr1 = check(errorarr1.value)) == false){
                alert(error);
            }
            if ((arr2 = check(errorarr2.value)) == false){
                alert(error);
            }
            else{
                result = "Объединение: " + unification(arr1, arr2) + "\n";
                result += "Пересечение: " + intersection(arr1, arr2) + "\n";
                result += "Дополнение 1 массива: " + addition(arr1, arr2) +"\n";
                result += "Дополнение 2 массива: " + addition(arr2, arr1) +"\n";
                result += "Симметрическая разность: " + SymmetricDifference(arr1, arr2);   
            }
            document.getElementById("outResult").innerText = "Результат операций:\n" + result;
        }
    </script>
</body>
</html>
