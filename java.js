
        function validate()
        {
            var dat=document.getElementById('pas').value;
                var bet=document.getElementById('cpas').value;
                if(dat!=bet)
                {
                    document.getElementById('vert').innerHTML="Please Verify Password";
                    return false;
                }
                return true;
          }
         