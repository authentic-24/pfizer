<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DiagnosticQuestion;

class DiagnosticQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Eliminar todas las preguntas existentes para hacer una importación limpia
        DiagnosticQuestion::truncate();

        $questions = [
            // Nivel Principiante (1-9)
            [
                'category' => 'excel',
                'question' => '¿Qué es Microsoft Excel principalmente?',
                'option_a' => 'Un programa para escribir reportes medicos en formato de texto.',
                'option_b' => 'Una base de datos relacional compleja.',
                'option_c' => 'Un programa de hoja de calculo utilizado para organizar, calcular y analizar datos.',
                'option_d' => 'Una aplicacion para crear presentaciones con diapositivas.',
                'correct_answer' => 'c',
            ],
            [
                'category' => 'excel',
                'question' => 'Quieres seleccionar toda la columna donde estan los nombres de los pacientes. ¿Como lo haces rapidamente?',
                'option_a' => 'Arrastrando el raton desde la primera hasta la ultima celda.',
                'option_b' => 'Haciendo clic en la letra superior que identifica la columna (ej. "B").',
                'option_c' => 'Presionando la tecla Enter varias veces.',
                'option_d' => 'Haciendo doble clic en cualquier celda de la columna.',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => 'En Excel, ¿que simbolo debe ir siempre al principio de una celda para que el programa entienda que vas a escribir una formula o ecuacion?',
                'option_a' => 'El simbolo de suma (+).',
                'option_b' => 'El simbolo de exclamacion (!).',
                'option_c' => 'El signo igual (=).',
                'option_d' => 'El simbolo de numero (#).',
                'correct_answer' => 'c',
            ],
            [
                'category' => 'excel',
                'question' => '¿Que combinacion de teclas (atajo) se utiliza comunmente para "Copiar" el nombre de un medicamento de una celda a otra?',
                'option_a' => 'Ctrl + C',
                'option_b' => 'Ctrl + V',
                'option_c' => 'Ctrl + Z',
                'option_d' => 'Ctrl + P',
                'correct_answer' => 'a',
            ],
            [
                'category' => 'excel',
                'question' => 'Tienes una lista con los pesos de los pacientes. ¿Que boton de la barra de herramientas te permite sumar todos esos valores con un solo clic?',
                'option_a' => 'Combinar y centrar.',
                'option_b' => 'Autosuma (simbolo Σ).',
                'option_c' => 'Formato condicional.',
                'option_d' => 'Ordenar y filtrar.',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => '¿Donde puedes ver el contenido real de una celda o la formula completa que se esta usando?',
                'option_a' => 'En la barra de estado inferior.',
                'option_b' => 'En la barra de formulas en la parte superior.',
                'option_c' => 'En el menu Archivo.',
                'option_d' => 'En los encabezados de columna.',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => 'Si deseas que los encabezados de tu tabla destaquen mas, ¿que formato deberias aplicarles?',
                'option_a' => 'Negrita y color de relleno en la celda.',
                'option_b' => 'Cambiar el tipo de datos a "Moneda".',
                'option_c' => 'Ocultar la fila.',
                'option_d' => 'Insertar un grafico de barras.',
                'correct_answer' => 'a',
            ],
            [
                'category' => 'excel',
                'question' => 'Tienes una lista de pacientes y quieres ordenarlos alfabeticamente por su apellido. ¿Que herramienta usar?',
                'option_a' => 'Buscar y seleccionar.',
                'option_b' => 'Ordenar y filtrar (de la A a la Z).',
                'option_c' => 'Inmovilizar paneles.',
                'option_d' => 'Validacion de datos.',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => 'Necesitas escribir el nombre de un paciente (celda A2) y su apellido (celda B2) juntos en una sola celda. ¿Que funcion usarias?',
                'option_a' => '=SUMAR(A2;B2)',
                'option_b' => '=UNIR(A2;B2)',
                'option_c' => '=CONCATENAR(A2;B2) o =A2&" "&B2',
                'option_d' => '=TEXTO(A2;B2)',
                'correct_answer' => 'c',
            ],
            // Nivel Intermedio (10-18)
            [
                'category' => 'excel',
                'question' => 'Quieres que en la lista de turnos, las celdas de las enfermeras que tienen el turno "Noche" se pinten automaticamente de color azul. ¿Que herramienta utilizas?',
                'option_a' => 'Estilos de celda manuales.',
                'option_b' => 'Formato condicional.',
                'option_c' => 'Insertar tabla.',
                'option_d' => 'Color de fuente.',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => 'Tienes un registro de 200 pacientes. ¿Que funcion te permite contar exactamente cuantas celdas tienen datos ignorando las celdas en blanco?',
                'option_a' => '=CONTAR.BLANCO',
                'option_b' => '=CONTARA',
                'option_c' => '=SUMAR',
                'option_d' => '=PROMEDIO',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => 'Necesitas calcular la presion arterial media de un paciente en sus ultimos 5 controles. ¿Que funcion usas?',
                'option_a' => '=MEDIA()',
                'option_b' => '=PROMEDIO()',
                'option_c' => '=MEDIANA()',
                'option_d' => '=SUMA() / 100',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => 'Tu lista de pacientes es muy larga y al bajar dejas de ver los titulos de las columnas. ¿Que herramienta te permite mantener esa primera fila siempre visible?',
                'option_a' => 'Ocultar fila.',
                'option_b' => 'Dividir ventana.',
                'option_c' => 'Inmovilizar paneles (Inmovilizar fila superior).',
                'option_d' => 'Agrupar filas.',
                'correct_answer' => 'c',
            ],
            [
                'category' => 'excel',
                'question' => 'Tienes que imprimir el censo diario de pacientes que ocupa 3 hojas. ¿Como haces para que los encabezados de las columnas se impriman automaticamente al inicio de cada pagina?',
                'option_a' => 'Copio y pego los titulos en cada pagina manualmente antes de imprimir.',
                'option_b' => 'En "Disposicion de pagina", uso la opcion "Imprimir titulos".',
                'option_c' => 'Uso el encabezado y pie de pagina regular.',
                'option_d' => 'Reduzco el tamano de fuente para que todo quepa en una hoja.',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => '¿Que funcion utilizarias para sumar el total de insumos utilizados, pero solo si el insumo es "Jeringas de 5ml"?',
                'option_a' => '=SUMA()',
                'option_b' => '=SUMAR.SI()',
                'option_c' => '=CONTAR.SI()',
                'option_d' => '=BUSCARV()',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => 'Quieres asegurarte de que en la columna de "Frecuencia Cardiaca" solo puedan ingresar numeros entre 40 y 200. ¿Que herramienta usas?',
                'option_a' => 'Proteger hoja.',
                'option_b' => 'Formato de numero.',
                'option_c' => 'Validacion de datos.',
                'option_d' => 'Bloquear celda.',
                'correct_answer' => 'c',
            ],
            [
                'category' => 'excel',
                'question' => 'Tienes el numero de historia clinica de un paciente y necesitas que Excel busque automaticamente su nombre en otra hoja. ¿Que funcion es la mas indicada?',
                'option_a' => '=BUSCARV() o =BUSCARX()',
                'option_b' => '=ENCONTRAR()',
                'option_c' => '=SI()',
                'option_d' => '=COINCIDIR()',
                'correct_answer' => 'a',
            ],
            [
                'category' => 'excel',
                'question' => 'Te piden un reporte rapido que resuma cuantos pacientes hay ingresados por cada especialidad medica. ¿Cual es la mejor herramienta de analisis?',
                'option_a' => 'Subtotales.',
                'option_b' => 'Tabla Dinamica.',
                'option_c' => 'Filtros avanzados.',
                'option_d' => 'Grafico de dispersion.',
                'correct_answer' => 'b',
            ],
            // Nivel Avanzado (19-24)
            [
                'category' => 'excel',
                'question' => 'Necesitas que una celda alerte sobre el estado del paciente: si la temperatura es mayor o igual a 38, debe decir "Fiebre", de lo contrario debe decir "Normal". ¿Que funcion usas?',
                'option_a' => '=BUSCAR()',
                'option_b' => '=SI(Temperatura>=38; "Fiebre"; "Normal")',
                'option_c' => '=O(Temperatura>=38)',
                'option_d' => '=CONDICION()',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => 'El sistema del laboratorio exporta resultados en un CSV donde todos los datos estan en una sola celda separados por comas. ¿Como los separas en columnas?',
                'option_a' => 'Usando "Buscar y reemplazar".',
                'option_b' => 'Con la herramienta "Texto en columnas" del menu Datos.',
                'option_c' => 'Copiando y pegando celda por celda.',
                'option_d' => 'Usando la funcion =SEPARAR().',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => 'Has creado un reporte de turnos automatizado, pero a veces una formula devuelve el error "#N/A". ¿Que funcion te permite ocultar ese error y mostrar un texto alternativo?',
                'option_a' => '=ESERROR()',
                'option_b' => '=SI.ERROR()',
                'option_c' => '=LIMPIAR()',
                'option_d' => '=OCULTAR()',
                'correct_answer' => 'b',
            ],
            [
                'category' => 'excel',
                'question' => 'Necesitas compartir el registro de medicamentos, pero quieres que solo puedan escribir en la columna "Dosis administrada". ¿Que debes hacer?',
                'option_a' => 'Guardar el archivo en formato PDF.',
                'option_b' => 'Ponerle contrasena de apertura al archivo.',
                'option_c' => 'Desbloquear solo las celdas de "Dosis administrada" y luego usar "Proteger hoja".',
                'option_d' => 'Ocultar las columnas de las formulas.',
                'correct_answer' => 'c',
            ],
            [
                'category' => 'excel',
                'question' => 'Necesitas evaluar dos condiciones para autorizar un alta: el paciente no tiene fiebre y los resultados de sangre son normales. ¿Que combinacion de funciones logicas necesitas?',
                'option_a' => '=SI() anidado con =Y()',
                'option_b' => '=SI() anidado con =O()',
                'option_c' => '=CONTAR.SI.CONJUNTO()',
                'option_d' => '=BUSCARV()',
                'correct_answer' => 'a',
            ],
            [
                'category' => 'excel',
                'question' => '¿Que es un "Macro" en Excel y como seria util en un entorno de enfermeria o administracion de salas?',
                'option_a' => 'Una formula matematica muy grande y compleja.',
                'option_b' => 'Un grafico que muestra datos a gran escala.',
                'option_c' => 'Una grabacion de pasos automatizados que permite ejecutar tareas repetitivas con un solo clic.',
                'option_d' => 'Una conexion en vivo con la base de datos del ministerio de salud.',
                'correct_answer' => 'c',
            ],
        ];

        foreach ($questions as $question) {
            DiagnosticQuestion::create($question);
        }
    }
}
