
            var name, arr, subj, cond = new Array();

$(document).ready(function(){  
            arr = $("#member_score").text();
            name = $("#member_name").text();
            subj = $("#test_name").text();
            arr = $.parseJSON(arr);
            subj = $.parseJSON(subj);
            cond[2] = (typeof arr[2] === 'undefined' ? '0' : arr[2]);
            cond[1] = (typeof arr[1] === 'undefined' ? '0' : arr[1]);
            cond[0] = (typeof arr[0] === 'undefined' ? '0' : arr[0]);
            if (subj[0] == 'Jquery Exam1')
            {
                cond[1] = (subj[0] == 'Jquery Exam1' ? arr[0] : arr[1]);
                cond[2] = (typeof arr[1] === 'undefined' ? '0' : arr[1]);
                cond[0] = (subj[0] == 'Jquery Exam1' ? '0' : arr[0]);
            }
          if(subj[0]== 'HTML basic '){
              cond[2]=(subj[0]== 'HTML basic '?arr[0]:arr[2]);
              cond[0]=(typeof arr[0] === 'undefined' ? '0' : '0');
          }
            //    cond[2]=(subj[0]=='HTML basic'?arr[0]:cond[0]);


            polarData = {
                labels: [name],
                datasets: [
                    {
                        fillColor: "#F7464A",
                        strokeColor: "#FFf",
                        hightlightStroke: "#aaa",
                        data: [cond[0]]
                    },
                    {
                        fillColor: "#46BFBD",
                        strokeColor: "#FFf",
                        hightlightStroke: "#aaa",
                        data: [cond[1]]
                    },
                    {
                        fillColor: "#949fb1",
                        strokeColor: "#fff",
                        hightlightStroke: "#aaa",
                        data: [cond[2]]

                    }]
            };
});
            window.onload = function () {
                var ctx = document.getElementById("chart-area").getContext("2d");
                window.myBar = new Chart(ctx).Bar(polarData, {
                    responsive: true,
                });
            };
