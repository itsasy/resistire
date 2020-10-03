<!DOCTYPE html>
<html>
     <body>
        <table>
             <tr>
              <td colspan=11 rowspan =2  style="font-weight: bold;font-size: 25px !important;width : 7px;text-align : center ;background-color: #0794C1;color:  #FFFFFF;border: 5px solid #878783; ">LISTA DE INCIDENCIAS - {{session('distrito')}}</td>
             </tr>
             <td colspan=1 rowspan =1  ></td>

        </table>
        <br>
      <div style ="padding: 15px !important;">
       
        <div class="row">
        <div class="col-12">
        
          <table>

            <tr>
                
              <td colspan=1 rowspan =1  style="font-weight: bold;font-size: 13px !important;width : 7px;text-align : center ;background-color:  #0794C1;color:  #FFFFFF; border: 5px solid #878783; height: 26px;"></td>
              <td colspan=1 rowspan =1  style="font-weight: bold;font-size: 13px !important;width : 25px;text-align : center ;background-color: #0794C1;color:  #FFFFFF;border: 2px solid #878783;padding 25px;	">Nombre </td>
              <td colspan=1 rowspan =1  style="font-weight: bold;font-size: 13px !important;width : 20px;text-align : center ;background-color: #0794C1;color:  #FFFFFF;border: 2px solid #878783;padding 25px;	">DNI </td>
              <td colspan=1 rowspan =1  style="font-weight: bold;font-size: 13px !important;width : 20px;text-align : center ;background-color: #0794C1;color:  #FFFFFF;border: 2px solid #878783;padding 25px;	">Teléfono </td>
              <td colspan=1 rowspan =1  style="font-weight: bold;font-size: 13px !important;width : 30px;text-align : center ;background-color: #0794C1;color:  #FFFFFF;border: 2px solid #878783;padding 25px;	">Tipo de Alerta </td>
              <td colspan=1 rowspan =1  style="font-weight: bold;font-size: 13px !important;width : 25px;text-align : center ;background-color: #0794C1;color:  #FFFFFF;border: 2px solid #878783;padding 25px;	">Fecha </td>
              <td colspan=1 rowspan =1  style="font-weight: bold;font-size: 13px !important;width : 45px;text-align : center ;background-color: #0794C1;color:  #FFFFFF;border: 2px solid #878783;padding 25px;	">Dirección de la Alerta </td>
              <td colspan=1 rowspan =1  style="font-weight: bold;font-size: 13px !important;width : 22px;text-align : center ;background-color: #0794C1;color:  #FFFFFF;border: 2px solid #878783;padding 25px;">Estado</td>
           
              <td colspan=1 rowspan =1  ></td>

            </tr>
         
            @foreach($data as $index => $datas)
        
                <tr>
                      <td colspan=1 style="text-align : center;color:  #FFFFFF ;background-color: #0794C1;border: 2px solid #878783;padding 25px;">{{$index+1}}</td>
                      <td colspan=1 style="border: 2px solid #878783;" >{{$datas->usuario[0]->usr_name . " ".$datas->usuario[0]->usr_patname . " ".$datas->usuario[0]->usr_matname}}</td>
                      <td colspan=1 style="text-align : center ;border: 2px solid #878783;">{{$datas->usuario[0]->usr_document}}</td>
                      <td colspan=1 style="text-align : center ;border: 2px solid #878783;">{{$datas->usuario[0]->usr_phone_1}}</td>
                      <td colspan=1 style="text-align : center ;border: 2px solid #878783;">{{$datas->municipal[0]->altt_desc}}</td>
                      <td colspan=1 style="text-align : center ;border: 2px solid #878783;">{{$datas->alt_date}}</td>
                      <td colspan=1 style="text-align : center ;border: 2px solid #878783;">{{$datas->alt_address}}</td>
             
                       @if($datas->alt_attended == 1 )
                       <td colspan=1 style="font-weight: bold;text-align : center ;border: 2px solid #878783;">{{"ATENTIDO"}}</td>
                       @else
                        <td colspan=1 style="font-weight: bold;text-align : center ;border: 2px solid #878783;">{{"NO ATENDIDO"}}</td>
                       @endif
                       
                       <td colspan=1 rowspan =1  ></td>

        
                    </tr>
            @endforeach
          </table>
        </div>

      </div>
      </div>  
        
   </body>
     
</html>