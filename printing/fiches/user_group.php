
<?php
define('FPDF_FONTPATH',ROOT.'/printing/fiches/font');
require('fpdf.php');

/**
 * 
 */
class myPDF extends FPDF
{
	var $nomuser;
	
	function init($nomuser)
	{
		$this->nomuser = $nomuser;
		
	}
	function getNomuser()
	{
		return $this->nomuser;
	}
	

	var $widths;
	var $aligns;

	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}

	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}
	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=5*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,5,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}

	function footer()
	{

	}
	function headerTable($user)
	{
		//$res = $comptabilite->recuperer_un_versement($idversement)->fetch();
		$this->SetFont('Arial','',12);
		$this->SetFillColor(70,184,103);
		//$this->Cell(178,5,'Creer Le '.$res['dateversement'],0,1,'R');
		$this->Ln(5);
		$this->Cell(100,10,'',0,1,'L');
		$this->Ln(2);
	
		$this->SetFont('Arial','B',12);
		//$this->Cell(180,5,"Reference de versement : ".$res['reference'],0,1,'C',1);
		
		$this->Ln(10);
		$this->SetFont('Arial','',12);
		$this->Ln(3);
        $this->Cell(40,5,'Banque  :', 0,0);
		
        //$this->Cell(40,5,$res['nom'], 0,1);
		$this->Ln(3);
		$this->Cell(40,5,iconv('UTF-8', 'windows-1252', 'Montant verssé  :'), 0,0);
		//$this->Cell(40,5,number_format($res['montant']).' '.$res['monnaie_verser'], 0,1);
		
		$this->Ln(20);
		
		
	}
	function viewTable($user)
	{
		$this->SetFont('Arial','',12); 
		$this->Cell(61,5,'',0,0);
		$this->SetFillColor(70,184,103);
		$this->Cell(30,5,iconv('UTF-8', 'windows-1252', 'Paiements attachés'),0,1,1);
		$this->Ln();
		$this->Cell(26,8,'DATE',1,0,'C',1);
	    $this->Cell(35,8,'MONTANT',1,0,'C',1);
	    $this->Cell(50,8,'CLIENT',1,0,'C',1);
	    $this->Cell(65,8,'DESCRIPTION',1,1,'C',1);
	    $this->SetFont('Arial','',8);

	}
}
$pdf = new myPDF();
$pdf->SetLeftMargin(15.2);
$pdf->SetRightMargin(15.2);
    
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetWidths(array(26,35,50,65));
$pdf->headerTable($user);
$pdf->viewTable($user);
$pdf->Output();
?>
