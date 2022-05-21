<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
        Третья лаба
        <input type="text" placeholder="Первое множество" id="mass1"/> Пример ввода: 1 2 3 4<br></td>
        <input type="text" placeholder="Втортое множество" id="mass2"/> Пример ввода: a b c d<br></td>
        <input type="text" placeholder="Пары отношений" id="mass3"/> Пример ввода:1 a,2 b,3 c<br></td>
        <input type="button"  value="Проверить" onclick="main();"/><br>
        <output type="" id = "Outputs"></output>
</body>
<script>
    let error_text = ""; 
    function finderror(mass_,mass_1,mass_2) {
        error_text = ""; 
        if (mass_=="" || mass_1=="" || mass_2=="") {
            error_text = "Поля ввода не должны быть пустыми";
        }
        else if (mass_.length != 4 || mass_1.length!=4) { 
                error_text = "Множества должны содержать по 4 элемента каждый";
            }
        else{
            for(let i = 0; i < mass_2.length; i++) {
                mass_2[i] = mass_2[i].split(" ");
                if(mass_2[i][0]=="" || mass_2[i][1]=="" || mass_2[i].length!=2){
                    error_text="Неверный формат ввода отношений\nПравильный ввод: (Элемент первого множества)(пробел)(Элемент второго множества)(запятая (если необходимо ввести ещё отношение))";
                    break;
                }  
            }
        }
        if (error_text) {
            return false; 
        }else {
            return true; 
        }
    }

    function main() {  
        let output="\nМатрица отношений:\n\n";
        let mass = document.getElementById('mass1').value.split(" ");
        let mass1 = document.getElementById('mass2').value.split(" ");
        let mass2 = document.getElementById('mass3').value.split(",");
        let mass3=[4];

        for(let i=0;i<4;i++)
            mass3[i]=[0,0,0,0];
        if(finderror(mass,mass1,mass2)){
            for(let i = 0; i < mass2.length; i++) {
                let x = mass.indexOf(mass2[i][0]);
                let y = mass1.indexOf(mass2[i][1]);
                if(x != -1 && y != -1)
                    mass3[x][y] = 1; 
            }
            for(let i=0;i<4;i++){
                for(let j=0;j<4;j++)
                    output+=mass3[i][j]+" ";
                output+="\n";
            }
            output+="\n";

            output+=firsttosec(mass3)+"\n"+sectofirst(mass3);
            document.getElementById("Outputs").innerText=output;
        }
        else
            alert(error_text);
    }
    function firsttosec(mass3){
        for(let i=0; i<4;i++){
            let count=0;
            for(let j=0; j<4;j++)
                if(mass3[i][j]==1){count++;};
            if(count!=1)
                return "Не является функцией первого множества во второе";
        }
        return "Является функцией первого множества во второе";
            
        
    }
    function sectofirst(mass3){
        for(let j=0; j<4;j++){
            let count=0;
            for(let i=0; i<4;i++)
                if(mass3[i][j]==1){count++;};
                if(count!=1)
                return "Не является функцией второго множества в первое";
        }
        return "Является функцией второго множества в первое";
    }
</script>
</html>