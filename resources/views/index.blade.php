<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    
    

    <form method="POST" id="lead-form">
        
        <input name="lead-name" type="text" id="lead-name">
        
        <input name="lead-email" type="email" id="lead-email">
        
        <select name="lead-interests" id="lead-interests">
            <option value="0">Cinema</option>
            <option value="1">Music</option>
            <option value="2">Sports</option>
        </select>        

        <button type="submit">Submit</button>

    </form>

    <script>
        
        document.addEventListener('DOMContentLoaded', () => {

            document.getElementById('lead-form').addEventListener('submit', 
                async (e) => {
                    
                    e.preventDefault();

                    const response = await fetch('{{ route('store') }}',
                    {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            name: document.getElementById('lead-name').value,
                            email: document.getElementById('lead-email').value,
                            interest: document.getElementById('lead-interests').value,
                        })                      
                        
                    });
                    
                    const data = await response.json();

                    if(response.status === 422){
                        
                        const error = data.errors;
                    
                        alert( Object.values(data.errors).flat().join('\n'));

                        console.log(data.errors);
                        
                        return;
                    }
                    
                    console.log(data);                       
                }
            )

        });


    </script>
</body>
</html>