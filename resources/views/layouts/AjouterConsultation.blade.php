<div  id="addconsultation" class="modal-holder hide" class>
    <div   id="addconsultation" class="modal-custom">
        <div id="addconsultation" class="close-modal"><i class="fa-solid fa-xmark"></i></div>



        <form method="POST" enctype="multipart/form-data"  action="{{route('Consultations.store')}}" class="AjouterForm p-4  m-3" style="background-color: #fff;border-radius:5px" >

            @csrf
                <h3 class="text-center my-3" >Ajouter Consultation</h3>
                <div class="row">

                    <div class="col-6">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Numéro Consultation</label>
                            <div class="d-flex" >
                                <input required type="text"  name="NumeroConsultation" class="form-control" id="exampleFormControlInput1" >
                                <button  type="button" class="btn btn-success"  id="generate" >
                                    <i class="fa-solid fa-lightbulb"></i>
                                </button>
                            </div>
                        </div>
                    </div>
            <div class="col-6">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Patient</label>
                    <select required name="patient_id"  id="patient" class="form-select " aria-label=".form-select-lg example">
                        <option value="" selected>Choisir Patient</option>
                        @foreach ($patients as $patient )
                        <option value="{{$patient->id}}">{{$patient->Nom}} - {{$patient->Prenom}} - {{$patient->Numero}} </option>
                        @endforeach
                      </select>
                </div>
            </div>

            <div class="col-6">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Object</label>
                    <textarea required name="Objet" class="form-control" id="exampleTextarea" rows="4"></textarea>
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Observation</label>
                    <textarea required name="Observation" class="form-control" id="exampleTextarea" rows="4"></textarea>
                </div>
            </div>

                  <div class="col-6">

                      <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Type consultation</label>
                          <select required name="TypeCosultation" id="operation" class="form-select " aria-label=".form-select-lg example">
                            <option selected>Choisir Patient</option>
                            <option value="Consultationgénéral ">Consultation général  </option>
                            <option value="operation ">Une Opération  </option>
                          </select>
                        </div>
                </div>


                    <div class="col-6 hide  pmedcin ">
                        <label for="exampleFormControlInput1" class="form-label">Date </label>
                        <input required id="dateconsul"  type="date" name="Date_consultation"  required class="form-control" id="exampleFormControlInput1" >
                    </div>

                    <div class="col-6 hide pdate">
                        <label for="exampleFormControlInput1" class="form-label">Time</label>
                    <select required class="form-select "  name="time" aria-label=".form-select-lg example">
                        <option selected>Choisir Time</option>
                      </select>
                     </div>


                    <div class="col-6 op hide">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Equipe</label>
                            <div class="d-flex" >
                            <select name="equipe_id" id="equipe" class="form-select " aria-label=".form-select-lg example">
                                <option   selected>Choisir une Equipe</option>
                                @foreach ($equipes as $equipe )
                                <option value="{{$equipe->id}}"> - {{$equipe->nom}} </option>
                                @endforeach
                            </select>
                            <button  type="button" class="btn btn-warning" ><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>




                    <div class="col-6  op hide">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Bloc operation</label>
                            <select name="blocoperation_id" class="form-select " aria-label=".form-select-lg example">
                                <option selected>Choisir un Block</option>
                                @foreach ($blocs as $bloc )
                                <option value="{{$bloc->id}}"> - {{$bloc->id}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 einfo ">

                    </div>

                    <div class="col-6 op hide">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date de Debut</label>
                            <input  type="datetime-local" name="DateDebut"   class="form-control" id="exampleFormControlInput1" >
                        </div>
                    </div>

                    <div class="col-6 op hide">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date de Fin</label>
                            <input  type="datetime-local" name="DateFin"   class="form-control" id="exampleFormControlInput1" >
                        </div>
                    </div>

                    <div class="mb-3 op hide">
                        <label for="exampleFormControlInput1" class="form-label">Operation observation</label>
                        <textarea name="ObservationOperation"  class="form-control" id="exampleTextarea" rows="4"></textarea>
                    </div>

                </div>

                  <button type="submit" class="btn btn-danger ">Enregistrer</button>
                </form>





    </div>
</div>


<script>

    let equipes ={{ Js::from($equipes)}}
    let patients ={{ Js::from($patients)}}
    let patientselect = document.querySelector('#patient')
    let inputsdate = document.querySelectorAll('.pmedcin')
    let pselect;
    patientselect.onchange=(e)=>{
        let idp = e.target.options[e.target.selectedIndex].value

        if(idp){
             pselect = patients.find(e=>e.id==idp)
            inputsdate.forEach(item=>item.classList.remove('hide'))
        }
        else{
            inputsdate.forEach(item=>item.classList.add('hide'))
        }
    }








    let btngenerer = document.querySelector('#generate')
    btngenerer.onclick=(e)=>{
        let data = ['A','B','C',1,2,3,'D','E','F','H','J',5,6,'K','L','M','V',4,,7,9]
        let generatedvalue = data.sort(()=>0.3-Math.random()).splice(0,10).join('')
        let input = e.target.closest('div').firstElementChild
        input.value=generatedvalue
    }


    let operation = document.querySelector('#operation');
    console.log(operation)
    operation.onchange=(e=>{
        console.log(e.target.options[e.target.selectedIndex].value)
        let operationsInputs=document.querySelectorAll('.op')
        if(e.target.options[e.target.selectedIndex].value.trim()=='operation'){
            operationsInputs.forEach(operation=>{operation.classList.remove('hide')
        operation.setAttribute('required','required')
        })

        }
        else{
        operationsInputs.forEach(operation=>{operation.classList.add('hide')
        operation.removeAttribute('required');
    })
        }
    })


    let equipe = document.querySelector('#equipe')
    equipe.onchange=(e=>{
        let idequipe = e.target.options[e.target.selectedIndex].value.trim()
       let result =  equipes.find(eq=>eq.id==idequipe)
       let targetdiv = e.target.closest('div').nextElementSibling
       let medcin=[];
       let infermiere=[];
       let einfo = document.querySelector('.einfo')
        result.equipemember.forEach(e=>{
        if(e?.medecin){
            medcin.push(e.medecin)
        }
        if(e?.infermiere){
            infermiere.push(e.infermiere)
        }
       } )
       einfo.innerHTML=`
       <textarea readonly class='form-control' > ${medcin.map(e=>`- medcin : ${ e.Matricule } ${ e.Nom } `)} </textarea>
       `

    })
</script>
<script src="{{asset('js/CheckDate.js')}}"></script>
