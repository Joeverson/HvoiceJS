$(function(){

    var voice = new webkitSpeechRecognition();
    var interrupt = true;

    voice.continuous = true;
    voice.interimResults = true;
    voice.lang = 'pt-br';

    $('.startVoice').on("click",function(){
        if(interrupt) {
            voice.start();
            interrupt = false;
        }else{
            voice.stop();
            interrupt = true;
        }
    });

    voice.onresult = function(e){

        var word = e.results[e.resultIndex][0].transcript.trim();


        if(e.results[e.resultIndex].isFinal){ // para que venha o resultado final e decisivo
            console.log(word);
            terms.forEach(function(action){

                if(new RegExp(action.term).test(word)){
                    action.take();
                }
            });
        }


    }
    voice.onerror = function(error){ $('.errorVoice').html('ERROR found! : ' + error.error); } // apresentação do error encontrado

});