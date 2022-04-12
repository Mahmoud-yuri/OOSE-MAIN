<?php

function listDir ($args = array()){
        $txtdirpatch = "txts/";
        if ($handler = scandir($txtdirpatch, 1)) {
            foreach ($handler as $key => $value) {
                if ($value != "." && $value!="..") {
                    echo "<tr>";
                    $file_content = "";
                    $filesize = filesize($txtdirpatch.$value);
                    if($filesize!=0){
                        $fichero_texto = fopen ($txtdirpatch.$value, "r");
                        $file_content = fread($fichero_texto, filesize($txtdirpatch.$value));
                        fclose($fichero_texto);
                    }
                    
                    $value = $Outcome = str_replace(" ", "_", $value);
                    echo "
						<td class='p-3'>
							<div class='flex align-items-center'>
								<img class='rounded-full h-12 w-12   object-cover' src='./img/icon2.png'>
								<div class='ml-3'>
									<div>".$value."</div>
									<div class='text-gray-500'>".$filesize." bytes</div>
								</div>
							</div>
						</td>
						
						<td class='p-3'>
                        
                        <a href='editor.php?fileName=txts/".$value."' class='text-gray-400 hover:text-gray-100  mx-2'>
								<i class='material-icons-outlined text-base'>edit</i>
							</a>
							<a href='?FileNameDelete=".$value."' class='text-gray-400 hover:text-gray-100 ml-2'>
								<i class='material-icons-round text-base'>delete_outline</i>
							</a>
						</td>
";
                }
                
            }
           
           
        }
    
}

function deleteFile($args = array())
{ 
    unlink("txts/".$args["fileName"]);
}


function almacenarArchivo($args = array())
{ 
        $filename = preg_replace('/\s+/', '_', $args["fileName"]).".txt";

        $fh = fopen("txts/".$filename, 'a') or die("Error can't create file");
  
        $texto = $args["text"];
        
        fwrite($fh, $texto) or die("Could not write to new file, please check permissions");
        
        fclose($fh);
        
        echo "It has been written without problems";
    
}


if (isset($_GET["FileNameDelete"])) {
    deleteFile(["fileName"=>$_GET["FileNameDelete"]]);
}

if (isset($_POST["titulo"]) && isset($_POST["text"]) ) {
    almacenarArchivo(["fileName"=>$_POST["titulo"],"text"=>$_POST["text"]]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link
	href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
	rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.9/tailwind.min.css">
</head>


<style>
	.table {
		border-spacing: 0 15px;
	}

	i {
		font-size: 1rem !important;
	}

	.table tr {
		border-radius: 20px;
	}

	tr td:nth-child(n+5),
	tr th:nth-child(n+5) {
		border-radius: 0 .625rem .625rem 0;
	}

	tr td:nth-child(1),
	tr th:nth-child(1) {
		border-radius: .625rem 0 0 .625rem;
	}

    .modal {
    transition: opacity 0.25s ease;
    }
    body.modal-active {
    overflow-x: hidden;
    overflow-y: visible !important;
    }
    .opacity-95 {opacity: .95;}
</style> 

<body>
<!-- component -->
<div class="flex items-center justify-center min-h-screen bg-gray-900">
	<div class="col-span-12">
		<div class="overflow-auto lg:overflow-visible ">

<button class="text-center modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Add new file</button>

			<table class="table text-gray-400 border-separate space-y-6 text-sm">
				<thead class="bg-gray-800 text-gray-500">
					<tr>
						<th class="p-3">File name</th>
						<th class="p-3 text-left">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr class="bg-gray-800">
                        <?php listDir(); ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>



<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
  <div class="modal-overlay absolute w-full h-full bg-white opacity-95"></div>

  <div class="modal-container fixed w-full h-full z-50 overflow-y-auto ">
    
	<div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-black text-sm z-50">
      <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
      (Esc)
    </div>

    <div class="modal-content container mx-auto h-auto text-left p-4">
     
	  <!--titulo-->
      <div class="flex justify-between items-center pb-2">
        <p class="text-2xl font-bold">Add new file</p>
      </div>

      <!--Body-->

      <div class="flex items-center justify-center h-screen">
  <div class="bg-gray-800 flex flex-col w-80 border border-gray-900 rounded-lg px-8 py-10">
  <div class="text-white mt-10">
    <h1 class="font-bold text-4xl">File</h1>
    <p class="font-semibold">file details</p>
  </div>
  <form class="flex flex-col space-y-8 mt-10" method="POST" action="/index.php">
    <input type="text" name="titulo" required placeholder="file name" class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500">
    <textarea type="text" name="text" required placeholder="content file" class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500"></textarea>
    <button class="border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold">Add</button>
  </form>
</div>
</div>
      
      <!--Footer-->
      <div class="flex justify-end pt-2">
        <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">close</button>
      </div>

    </div>
  </div>
</div>


</body>
</html>


<script>
  var openmodal = document.querySelectorAll('.modal-open')
  for (var i = 0; i < openmodal.length; i++) {
    openmodal[i].addEventListener('click', function(event){
  	event.preventDefault()
  	toggleModal()
    })
  }
  
  const overlay = document.querySelector('.modal-overlay')
  overlay.addEventListener('click', toggleModal)
  
  var closemodal = document.querySelectorAll('.modal-close')
  for (var i = 0; i < closemodal.length; i++) {
    closemodal[i].addEventListener('click', toggleModal)
  }
  
  document.onkeydown = function(evt) {
    evt = evt || window.event
    var isEscape = false
    if ("key" in evt) {
  	isEscape = (evt.key === "Escape" || evt.key === "Esc")
    } else {
  	isEscape = (evt.keyCode === 27)
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
  	toggleModal()
    }
  };
  
  
  function toggleModal () {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
  }
  
   
</script>