
export function Contagem(tab1,tab2,contador){	
     let acertos = 0	   
        for(let L=0; L < tab1.length; L++){
            for (let C=0; C < tab1[L].length; C++){
                if(tab1[L][C] == tab2[L][C]){
                    acertos++
                }
           }	
        }
        if(acertos == contador){
            alert('você venceu, parabéns terráqueo');
        }else if (acertos <= contador){
            alert('você acertou:' + " " + acertos + "," + " "+  'continue se esforçando ;)')
        }
    console.log(contador)
    console.log(acertos)
   
}
    