    <?php



    require('assets/fpdf/fpdf.php');


    class PDF extends FPDF
    {
    function Footer()
      {

        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Print centered page number
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '-{nb}', 0, 0, 'C');


      }
    }

    // Creación del objeto de la clase heredada
    $pdf =  new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);
    $fill = false;


    if ($dace->assignment_type == "1") {
      $common = "X";
      $exceptional = "";
      $special = "";
    } elseif ($dace->assignment_type == "2") {
      $common = "";
      $exceptional = "X";
      $special = "";
    } elseif ($dace->assignment_type == -"3") {
      $common = "";
      $exceptional = "";
      $special = "X";
    } else {
      $common = "";
      $exceptional = "";
      $special = "";
    }


    $pdf->Cell(40);

    $pdf->Cell(100, 5, utf8_decode('SOLICITA ASIGNACIÓN DE CASA'), '', 0, 'C', false);

    $pdf->SetFont('Arial', '', 9);

    $pdf->Cell(5, 4, $common, 'LRTB', 0, 'C', false);

    $pdf->Cell(18, 5,  utf8_decode('COMÚN'), '', 0, 'C', false);
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40);

    $pdf->Cell(100, 5, utf8_decode('(AF-2021)'), '', 0, 'C', false);
    $pdf->SetFont('Arial', '', 9);

    $pdf->Cell(5, 4, $exceptional, 'LRTB', 0, 'C', false);

    $pdf->Cell(30, 5,  utf8_decode('EXCEPCIONAL'), '', 0, 'C', false);
    $pdf->Ln();
    $pdf->Cell(40);
    $pdf->Cell(100, 5, '', '', 0, 'C', false);
    $pdf->SetFont('Arial', '', 9);

    $pdf->Cell(5, 4, $special, 'LRTB', 0, 'C', false);

    $pdf->Cell(23, 5,  utf8_decode('ESPECIAL'), '', 0, 'C', false);
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(180, 8, utf8_decode('SEÑOR GENERAL DE EJÉRCITO COMANDANTE GENERAL DEL EJÉRCITO.- LIMA'), '', 1, 'C', false);


    $pdf->Cell(201, 5, utf8_decode('(COBIENE - DACE)'), '', 1, 'C', false);

    $pdf->SetFont('Arial', 'BU', 10);

    $pdf->Ln();

    $pdf->Cell(201, 5, utf8_decode('DATOS PERSONALES DEL TITULAR'), '', 1, '', false);

    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.3);
    $pdf->SetTextColor(0);
    // Título    $pdf->Cell(90,4,'______________________','',0,'C',false);

    $pdf->SetFillColor(0, 0, 0);


    $pdf->SetFont('Arial', 'B', 10);

    $pdf->SetFillColor(169, 189, 207);
    $pdf->Cell(15, 5, 'GRADO', 'LRTB', 0, 'C', true);

    $pdf->Cell(70, 5, 'APELLIDOS Y NOMBRES', 'LRTB', 0, 'C', true);

    $pdf->Cell(39, 5, utf8_decode('N° DE CIP'), 'LRTB', 0, 'C', true);



    $pdf->Cell(59, 5, 'OBSERVACIONES', 'LRTB', 1, 'C', true);

    //////Datos de la Base de datos



    $pdf->Cell(15, 5, '', 'LRTB', 0, 'C', false);

    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(70, 5, utf8_decode($user->name_user) . ' ' . utf8_decode($user->lastname_user), 'LRTB', 0, 'C', false);

    $pdf->Cell(39, 5, $this->encryption->decrypt($user->cip_user), 'LRTB', 0, 'C', false);

    $pdf->Cell(59, 5, utf8_decode($dace->observation_user), 'LRTB', 1, 'C', false);





    $pdf->Cell(15, 5, '', 'LRTB', 0, 'C', false);

    $pdf->Cell(70, 5, utf8_decode($spous->name_spouse) . ' ' . utf8_decode($spous->lastname_spouse), 'LRTB', 0, 'C', false);

    $pdf->Cell(39, 5, $spous->cip_spouse, 'LRTB', 0, 'C', false);

    $pdf->Cell(59, 5, utf8_decode($spous->obser_spouse), 'LRTB', 1, 'C', false);





    // Salto de línea



    $pdf->SetFont('Arial', 'BU', 10);


    $pdf->Ln();

    $pdf->Cell(201, 5, utf8_decode('DATOS PERSONALES DE CONYUGE E HIJOS (**)'), '', 1, '', false);


    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.3);
    $pdf->SetTextColor(0);
    // Título    $pdf->Cell(90,4,'______________________','',0,'C',false);

    $pdf->SetFillColor(0, 0, 0);


    $pdf->SetFont('Arial', 'B', 10);

    $pdf->SetFillColor(169, 189, 207);
    $pdf->Cell(20, 5, 'PADRES', 'LRTB', 0, 'C', true);

    $pdf->Cell(60, 5, 'APELLIDOS Y NOMBRES', 'LRTB', 0, 'C', true);

    $pdf->Cell(33, 5, utf8_decode('N° DE CIP'), 'LRTB', 0, 'C', true);

    $pdf->Cell(33, 5, utf8_decode('N° DE DNI '), 'LRTB', 0, 'C', true);



    $pdf->Cell(37, 5, 'OBS.', 'LRTB', 1, 'C', true);

    //////Datos de la Base de datos


    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(20, 5, 'CONYUGE', 'LRTB', 0, 'C', false);

    $pdf->Cell(60, 5, utf8_decode($spous->name_spouse) . ' ' . utf8_decode($spous->lastname_spouse), 'LRTB', 0, 'C', false);
    $pdf->Cell(33, 5, $spous->dni_spouse, 'LRTB', 0, 'C', false);
    $pdf->Cell(33, 5, $spous->cip_spouse, 'LRTB', 0, 'C', false);
    $pdf->Cell(37, 5, utf8_decode($spous->obser_spouse), 'LRTB', 1, 'C', false);

    $c = 1;
    foreach ($sons as $son) {


      $pdf->Cell(20, 5, 'HIJO (' . $c++ . ')', 'LRTB', 0, 'C', false);
      $pdf->Cell(60, 5, utf8_decode($son->name_son_user) . ' ' . utf8_decode($son->lastname_son_user), 'LRTB', 0, 'C', false);
      $pdf->Cell(33, 5, utf8_decode($son->cip_son_user), 'LRTB', 0, 'C', false);
      $pdf->Cell(33, 5, utf8_decode($son->dni_son_user), 'LRTB', 0, 'C', false);
      $pdf->Cell(37, 5, utf8_decode($son->observations), 'LRTB', 1, 'C', false);
    }


    $pdf->SetFont('Arial', 'BU', 10);


    $pdf->Ln();
    $pdf->Cell(10, 5, utf8_decode(''), '', 0, '', false);

    $pdf->Cell(100, 7, utf8_decode('TELÉFONO'), '', 0, '', false);
    $pdf->Cell(50, 7, utf8_decode('CORREO ELECTRONICO'), '', 1, '', false);

    //$pdf->SetFillColor(169,189,207);$pdf->Ln();

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 5, utf8_decode('FIJO'), 'LRTB', 0, 'C', true);
    $pdf->Cell(30, 5, utf8_decode('CELULAR'), 'LRTB', 0, 'C', true);

    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(35, 5, utf8_decode(''), '', 0, 'C', false);
    $pdf->Cell(88, 5, utf8_decode($user->email_user), 'LRTB', 1, 'C', false);


    $pdf->Cell(30, 5, utf8_decode($user->tel_user), 'LRTB', 0, 'C', false);
    $pdf->Cell(30, 5, utf8_decode($user->phone_user), 'LRTB', 1, 'C', false);








    $pdf->SetFont('Arial', 'BU', 10);


    $pdf->Ln();

    $pdf->Cell(201, 5, utf8_decode('LUGAR ACTUAL DE TRABAJO.'), '', 1, '', false);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(169, 189, 207);
    $pdf->Cell(40, 5, 'UNIDAD', 'LRTB', 0, 'C', true);
    $pdf->Cell(72, 5, 'GRAN UNIDAD', 'LRTB', 0, 'C', true);
    $pdf->Cell(71, 5, 'NUCLEO', 'LRTB', 1, 'C', true);


    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(40, 5, $workplace->unit_workplace_user, 'LRTB', 0, 'C', false);
    $pdf->Cell(72, 5, $workplace->greatunit_workplace_user, 'LRTB', 0, 'C', false);
    $pdf->Cell(71, 5, $workplace->core_workplace_user, 'LRTB', 1, 'C', false);


    $pdf->SetFont('Arial', 'BU', 10);




    $pdf->Cell(201, 5, utf8_decode('CAMBIADO DE COLOCACIÓN DE GGUU:'), '', 1, '', false);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(169, 189, 207);
    $pdf->Cell(40, 5, 'UNIDAD', 'LRTB', 0, 'C', true);
    $pdf->Cell(72, 5, 'GRAN UNIDAD', 'LRTB', 0, 'C', true);
    $pdf->Cell(71, 5, 'NUCLEO', 'LRTB', 1, 'C', true);


    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(40, 5, $gguu->unit_gguu_placement, 'LRTB', 0, 'C', false);
    $pdf->Cell(72, 5, $gguu->greatunit_gguu_placement, 'LRTB', 0, 'C', false);
    $pdf->Cell(71, 5, $gguu->core_gguu_placement, 'LRTB', 1, 'C', false);

    $pdf->SetFont('Arial', 'BU', 10);

    $pdf->Cell(201, 5, utf8_decode('CAMBIADO DE COLOCACIÓN ZE:'), '', 1, '', false);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(169, 189, 207);
    $pdf->Cell(40, 5, 'UNIDAD', 'LRTB', 0, 'C', true);
    $pdf->Cell(72, 5, 'GRAN UNIDAD', 'LRTB', 0, 'C', true);
    $pdf->Cell(71, 5, 'NUCLEO', 'LRTB', 1, 'C', true);

    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(40, 5, $ze->unit_ze_placement, 'LRTB', 0, 'C', false);
    $pdf->Cell(72, 5, $ze->greatunit_ze_placement, 'LRTB', 0, 'C', false);
    $pdf->Cell(71, 5, $ze->core_ze_placement, 'LRTB', 1, 'C', false);

    // Salto de línea
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 9);
    $pdf->Multicell(185, 4, utf8_decode('(**) SOLO SE CONSIDERA CARGA FAMILIAR AL CÓNYUGE, HIJOS MENORES DE EDAD, O MAYORES CON DISCAPACIDAD QUE VIVAN CON EL TITULAR, EL PUNTAJE MÁXIMO POR HIJO SERÁ DE CUATRO (04) PUNTOS; EL CARNÉ DEBERÁ ESTAR VIGENTE AL MES DE ENERO DEL AÑO DEL PROCESO E INSCRITO EN EL REGISTRO DE FAMILIA.'), '', 'J', false);
    $pdf->SetFont('Arial', 'BU', 10);

    $pdf->Ln();

    $pdf->Multicell(185, 4, utf8_decode('SOLICITUDES REITERATIVAS PARA ASIGNACIÓN DE CASA EN LA GUARNICIÓN DE LIMA (AÑOS ANTERIORES) (***)'), '', 'J', false);
    $pdf->SetFont('Arial', 'BU', 10);

    $pdf->Ln();

    if ($rows_request == 1) {
      $yes = "X";
      $no = "";
    } else {
      $yes = "";
      $no = "X";
    }

    $pdf->Cell(10, 5, 'SI', '', 0, 'C', false);
    $pdf->Cell(7, 5, $yes, 'LRTB', 0, 'C', false);
    $pdf->Cell(10, 5, 'NO', '', 0, 'C', false);
    $pdf->Cell(7, 5, $no, 'LRTB', 1, 'C', false);

    $pdf->SetFont('Arial', 'BU', 10);


    $pdf->Ln();

    $pdf->Cell(201, 5, utf8_decode('EN CASO DE SER POSITIVO.'), '', 1, '', false);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.3);
    $pdf->SetTextColor(0);
    // Título    $pdf->Cell(90,4,'______________________','',0,'C',false);

    $pdf->SetFillColor(0, 0, 0);


    $pdf->SetFont('Arial', 'B', 10);

    $pdf->SetFillColor(169, 189, 207);

    $pdf->Cell(7, 10, utf8_decode('Nº'), 'LT', 0, 'C', true);

    $pdf->Cell(175, 5, utf8_decode('FECHA DE PRESENTACION DE LAS SOLICITUDES'), 'LRTB', 1, 'C', true);


    $pdf->Cell(7, 5, '', 'LR', 0, 'C', false);
    $pdf->Cell(57, 5, utf8_decode('Día'), 'LRTB', 0, 'C', true);
    $pdf->Cell(59, 5, utf8_decode('MES'), 'LRTB', 0, 'C', true);
    $pdf->Cell(59, 5, utf8_decode('AÑo'), 'LRTB', 1, 'C', true);
    if ($rows_request == 1) {
      $c = 1;
      foreach ($request_home as $key => $request) {

        $pdf->Cell(7, 5, '0' . $c++, 'LRTB', 0, 'C', false);
        $pdf->Cell(57, 5, $request->day_request_home, 'LRTB', 0, 'C', false);
        $pdf->Cell(59, 5, $request->month_request_home, 'LRTB', 0, 'C', false);
        $pdf->Cell(59, 5, $request->year_request_home, 'LRTB', 1, 'C', false);
      }
    } else {

      for ($i = 0; $i < 3; $i++) {
        $pdf->Cell(7, 5, '', 'LRTB', 0, 'C', false);
        $pdf->Cell(57, 5, ' ', 'LRTB', 0, 'C', false);
        $pdf->Cell(59, 5, utf8_decode(''), 'LRTB', 0, 'C', false);
        $pdf->Cell(59, 5, '', 'LRTB', 1, 'C', false);
      }
    }

    $pdf->Ln();

    $pdf->SetFont('Arial', '', 9);
    $pdf->Multicell(185, 4, utf8_decode('(***) POR CADA SOLICITUD REITERATIVA SE OTORGARÁ UN PUNTO COMO BONIFICACIÓN HASTA UN MÁXIMO DE 03, CONSIDERÁNDOSE VÁLIDAS LAS SOLICITUDES CONSECUTIVAS REMITIDAS EN PROCESOS ANTERIORES; ES DECIR, DESDE EL 31 DE OCTUBRE HASTA EL 30 DE ENERO, ACREDITANDO LA RECEPCIÓN POR EL DACEMEDIANTE EL SELLO DE LA MESA DE PARTES. 
    '), '', 'J', false);

    $pdf->SetAutoPageBreak(true, 30);
    $pdf->SetFont('Arial', 'BU', 10);

    $pdf->Ln();




    $pdf->Multicell(185, 4, utf8_decode('OCUPACIÓN DE CASA DE AÑOS ANTERIORES EN LA GUARNICIÓN DE LIMA'), '', 'J', false);
    $pdf->SetFont('Arial', 'BU', 10);

    $pdf->Ln();

    if ($rows_occupancy == 1) {
      $yesr = "X";
      $nor = "";
    } else {
      $yesr = "";
      $nor = "X";
    }

    $pdf->Cell(10, 5, 'SI', '', 0, 'C', false);
    $pdf->Cell(7, 5, $yesr, 'LRTB', 0, 'C', false);
    $pdf->Cell(10, 5, 'NO', '', 0, 'C', false);
    $pdf->Cell(7, 5, $nor, 'LRTB', 1, 'C', false);


    $pdf->Ln();

    $pdf->Cell(201, 5, utf8_decode('EN CASO DE SER POSITIVO.'), '', 1, '', false);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.3);
    $pdf->SetTextColor(0);

    $pdf->SetFont('Arial', 'BU', 10);







    /////////////


    $pdf->SetFillColor(0, 0, 0);


    $pdf->SetFont('Arial', 'B', 10);

    $pdf->SetFillColor(169, 189, 207);

    $pdf->Cell(20, 10, utf8_decode('PERIODO'), 'LT', 0, 'C', true);

    $pdf->Cell(81, 5, utf8_decode('DESDE'), 'LRTB', 0, 'C', true);
    $pdf->Cell(81, 5, utf8_decode('HASTA'), 'LRTB', 1, 'C', true);

    $pdf->Cell(20, 5, '', 'LR', 0, 'C', false);
    $pdf->Cell(27, 5, utf8_decode('Día'), 'LRTB', 0, 'C', true);
    $pdf->Cell(27, 5, utf8_decode('MES'), 'LRTB', 0, 'C', true);
    $pdf->Cell(27, 5, utf8_decode('AÑo'), 'LRTB', 0, 'C', true);
    $pdf->Cell(27, 5, utf8_decode('Día'), 'LRTB', 0, 'C', true);
    $pdf->Cell(27, 5, utf8_decode('MES'), 'LRTB', 0, 'C', true);
    $pdf->Cell(27, 5, utf8_decode('AÑo'), 'LRTB', 1, 'C', true);


    //////Datos de la Base de datos

    if ($rows_occupancy == 1) {
      $c = 1;
      foreach ($occupancy_home as $occupancy) {

        $pdf->Cell(20, 5, $c++, 'LRTB', 0, 'C', false);
        $pdf->Cell(81, 5, $occupancy->from_occupancy_home, 'LRTB', 0, 'C', false);
        $pdf->Cell(81, 5, $occupancy->to_occupancy_home, 'LRTB', 1, 'C', false);
      }
    } else {

      $pdf->Cell(20, 5, '1ER', 'LRTB', 0, 'C', false);
      $pdf->Cell(81, 5, ' ', 'LRTB', 0, 'C', false);
      $pdf->Cell(81, 5, utf8_decode(''), 'LRTB', 1, 'C', false);

      //////Datos de la Base de datos
      $pdf->Cell(20, 5, '2DO', 'LRTB', 0, 'C', false);
      $pdf->Cell(81, 5, ' ', 'LRTB', 0, 'C', false);
      $pdf->Cell(81, 5, utf8_decode(''), 'LRTB', 1, 'C', false);
    }




    $pdf->Ln();

    $pdf->SetFont('Arial', '', 9);
    $pdf->Multicell(185, 4, utf8_decode('* SI POSTULA PARA UN SEGUNDO PERÍODO NO SE LE ASIGNARA PUNTOS ADICIONALES. LO CUAL SERA VERIFICADO EN EL SISTEMA DEL DACE.
    '), '', 'J', false);


    $pdf->SetFont('Arial', '', 9);
    $pdf->Multicell(185, 4, utf8_decode('* AL PERSONAL QUE NUNCA HA OCUPADO CASA EN LA GUARNICION SE LE ASIGANARÁ CINCO (05) PUNTOS ADICIONALES.

    '), '', 'J', false);




    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.3);
    $pdf->SetTextColor(0);

    $pdf->SetFont('Arial', 'BU', 10);




    $pdf->Cell(201, 5, utf8_decode('PRIORIDADES PARA LA ASIGNACIÓN DE CASA (UBICACIÓN DE LA VILLA MILITAR)'), '', 1, 'C', false);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.3);
    $pdf->SetTextColor(0);




    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(169, 189, 207);
    $pdf->Cell(40, 5, '1RA PRIORIDAD', 'LRTB', 0, 'C', true);
    $pdf->Cell(72, 5, '2DA PRIORIDAD', 'LRTB', 0, 'C', true);
    $pdf->Cell(71, 5, '3RA PRIORIDAD', 'LRTB', 1, 'C', true);
    //////Datos de la Base de datos
    $pdf->Cell(40, 5, $pr->first_priority_dace, 'LRTB', 0, 'C', false);
    $pdf->Cell(72, 5, $pr->second_priority_dace, 'LRTB', 0, 'C', false);
    $pdf->Cell(71, 5, $pr->third_priority_dace, 'LRTB', 1, 'C', false);

    $pdf->SetFont('Arial', 'BU', 10);


    $pdf->Ln();


    $pdf->Cell(201, 5, utf8_decode('EN CASO DE SOLICITAR ASIGNACIÓN EXCEPCIONAL O ESPECIAL'), '', 1, '', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->Ln();
    $pdf->Cell(201, 5, utf8_decode('EL SUSCRITO SOLICITA ASIGNACIÓN EXCEPCIONAL O ESPECIAL POR EL MOTIVO SIGUIENTE:'), '', 1, '', false);

    $pdf->SetFont('Arial', '', 15);



    $pdf->SetFont('Arial', 'U', 30);
    $pdf->Cell(201, 5, utf8_decode('                                                              '), '', 1, '', false);
    $pdf->Cell(201, 7, utf8_decode('                                                              '), '', 1, '', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->Ln();
    $pdf->Cell(50, 5, utf8_decode('ADJUNTA DOCUMENTACIÓN'), '', 0, '', false);

    $pdf->Cell(10, 5, 'SI', '', 0, 'C', false);
    $pdf->Cell(7, 5, '', 'LRTB', 0, 'C', false);
    $pdf->Cell(10, 5, '   NO', '', 0, 'C', false);
    $pdf->Cell(7, 5, '', 'LRTB', 0, 'C', false);
    $pdf->Cell(17, 5, '   FOJAS', '', 0, 'C', false);
    $pdf->Cell(14, 5, '', 'LRTB', 1, 'C', false);


    $pdf->SetFont('Arial', 'BU', 10);


    $pdf->Ln();


    $pdf->Cell(201, 5, utf8_decode('DECLARACIÓN Y COMPROMISO'), '', 1, 'C', false);

    $pdf->Ln();

    $pdf->SetFont('Arial', '', 10);
    $pdf->Multicell(185, 4, utf8_decode('El suscrito, su cónyuge declaran y aceptan que toda la información proporcionada en esta solicitud es cierta y comprobable, teniendo carácter de declaración jurada y, estamos en condiciones de entregar los documentos sustentatorios cuando lo solicite el Jefe del Departamento de Administración de Casas del Ejército (DACE); caso contrario, automáticamente seremos descalificados, sin perjuicio de la acción penal que se proseguirá por falsedad al incurrir en el delito contra la fe pública, siendo sancionados de acuerdo a Ley.'), '', 'J', false);
    $pdf->Ln();
    $pdf->Cell(185, 5, ' Lima, ' . fecha(date(DATE_W3C)), '', 1, 'R', false);
    $pdf->Ln();



    $pdf->Cell(50, 5, '', '', 0, 'C', false);

    $pdf->Cell(30, 5, utf8_decode('INDICE '), 'LRT', 0, 'C', false);
    $pdf->Cell(15, 5, '', '', 0, 'C', false);
    $pdf->Cell(50, 5, '', '', 0, 'C', false);

    $pdf->Cell(30, 5, utf8_decode('INDICE'), 'LRT', 1, 'C', false);

    $pdf->Cell(50, 5, '', '', 0, 'C', false);
    $pdf->Cell(30, 5, utf8_decode('DERECHO'), 'LR', 0, 'C', false);
    $pdf->Cell(15, 5, '', '', 0, 'C', false);
    $pdf->Cell(50, 5, '', '', 0, 'C', false);
    $pdf->Cell(30, 5, utf8_decode('DERECHO'), 'LR', 1, 'C', false);

    $pdf->Cell(50, 5, '...............................................', '', 0, 'C', false);
    $pdf->Cell(30, 5, '', 'LR', 0, 'C', false);
    $pdf->Cell(15, 5, '', '', 0, 'C', false);
    $pdf->Cell(50, 5, '...............................................', '', 0, 'C', false);
    $pdf->Cell(30, 5, '', 'LR', 1, 'C', false);

    $pdf->Cell(50, 5, 'Firma Titular', '', 0, 'C', false);
    $pdf->Cell(30, 5, '', 'LR', 0, 'C', false);
    $pdf->Cell(15, 5, '', '', 0, 'C', false);
    $pdf->Cell(50, 5, 'Firma Titular', '', 0, 'C', false);
    $pdf->Cell(30, 5, '', 'LR', 1, 'C', false);

    $pdf->Cell(50, 5, 'Post Firma..............................', '', 0, 'C', false);
    $pdf->Cell(30, 5, '', 'LR', 0, 'C', false);
    $pdf->Cell(15, 5, '', '', 0, 'C', false);
    $pdf->Cell(50, 5, 'Post Firma.............................', '', 0, 'C', false);
    $pdf->Cell(30, 5, '', 'LR', 1, 'C', false);

    $pdf->Cell(50, 10, utf8_decode('DNI N°.....................................'), '', 0, 'C', false);
    $pdf->Cell(30, 10, '', 'LRB', 0, 'C', false);
    $pdf->Cell(15, 10, '', '', 0, 'C', false);
    $pdf->Cell(50, 10, utf8_decode('DNI N°.....................................'), '', 0, 'C', false);
    $pdf->Cell(30, 10, '', 'LRB', 1, 'C', false);



    $pdf->Cell(201, 5, utf8_decode('                                                                    '), '', 1, '', false);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Ln();
    $pdf->SetAutoPageBreak(true, 50);

    $pdf->Cell(50, 5, utf8_decode('ADJUNTA DOCUMENTACIÓN'), '', 0, '', false);

    $pdf->Cell(10, 5, 'SI', '', 0, 'C', false);
    $pdf->Cell(7, 5, '', 'LRTB', 0, 'C', false);
    $pdf->Cell(10, 5, '   NO', '', 0, 'C', false);
    $pdf->Cell(7, 5, '', 'LRTB', 0, 'C', false);
    $pdf->Cell(17, 5, '   FOJAS', '', 0, 'C', false);
    $pdf->Cell(14, 5, '', 'LRTB', 1, 'C', false);


    $pdf->SetFont('Arial', 'BU', 10);


    $pdf->Ln();


    $pdf->Cell(201, 5, utf8_decode('DOCUMENTOS A ADJUNTAR PARA LA EVALUACIÓN E INGRESO AL CUADRO DE ASIGNACIÓN:'), '', 1, '', false);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(201, 5, utf8_decode('COPIA SIMPLE DEL CIP, CIF Y DNI VIGENTES DEL TITULAR, ESPOSA(O) E HIJOS.'), '', 1, '', false);
    $pdf->Cell(201, 5, utf8_decode('En caso de ser beneficiado con casa de servicio presentará estos documentos adicionales:'), '', 1, '', false);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(201, 5, utf8_decode('1. Certificado negativo del titular y esposa de la SUNARP de Lima y Callao.'), '', 1, '', false);


    $pdf->Cell(201, 5, utf8_decode('2. Certificado Médico de no poseer enfermedades infecto contagiosas.'), '', 1, '', false);


    $pdf->Cell(201, 5, utf8_decode('3. Memorándum de cambio de Colocación.'), '', 1, '', false);


    $pdf->Cell(201, 5, utf8_decode('4. Última boleta de pago.'), '', 1, '', false);



    $pdf->Output();
