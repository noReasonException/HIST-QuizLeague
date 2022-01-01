<?php
/*class PrintMessage
* Gets the status ID and prints the message using window.alert() object
* Uses
*   js -> window.alert()
* @param
*     $MessageID -> The message id given from $_GET[] status back
* @private
*     $LoadedFile -> an object exported from json_decode
*     $EntryPrefix -> Επειδή δεν γίνεται json εγραφή να ξεκινάει
*                      απο νούμερο , βάζουμε prefix  :P :P
*
*
*/
class PrintMessage
{
    private $Loadedfile = null;
    private $EntryPrefix = 'STATUS_';

    private function LoadErrorList()
    {
        try {
            $this->Loadedfile = (array)json_decode(file_get_contents('../../config/errors.json'));
        } catch (Exception $e) {
            return 0;
        }
        return 1;
    }

    private function BlockThisIp()
    {
//TODO:IMPEMENT
    }

    private function ReportError()
    {
//TODO:IMPLEMENT
    }

    public function __construct($MessageID)
    {

        if ($this->LoadErrorList()) {
            if (isset($this->Loadedfile[$this->EntryPrefix . $MessageID])) {
                echo '<script>window.alert("' . $this->Loadedfile[$this->EntryPrefix . $MessageID] . '")</script>';
            } else {
                $this->BlockThisIp();
            }
        } else {
            echo '<script>window.alert("Άγνωστο σφάλμα,επικοινωνήστε με την υποστήριξη(κωδικός #005)")</script>';

        }
    }
}
?>