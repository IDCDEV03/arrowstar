<!-- resources/views/print_preview.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Print Preview</title>
    <style>
        /* Define print-specific styles here */
        @media print {

            /* Customize print layout styles */
            /* For example, you can hide some elements not needed in the print version */
            .no-print {
                display: none;
            }
        }

        #header {
            display: table-header-group;
        }

        #main {
            display: table-row-group;
        }

        #footer {
            display: table-footer-group;
        }
    </style>
</head>

<body>
    <table>

        <thead>
         <label class="txt-primary">บริษัท แอร์โร่วสตาร์ จำกัด</label>
        </thead>

        <tbody>
            <!-- Page content -->
        </tbody>

        <tfoot>
            <!-- Will print at the bottom of every page -->
        </tfoot>

    </table>

</body>

</html>
<?php /**PATH D:\GitHub\arrowstar\resources\views/admin/print_preview.blade.php ENDPATH**/ ?>