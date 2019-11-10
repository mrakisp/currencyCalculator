<link rel="stylesheet" type="text/css" href="style.css">
<?php 

//Model
class CurrencyConverter {
	private $baseValue = 0;	
			
	private $rates = [					// ΚΑΤΑΧΩΡΩ ΟΛΑ ΤΑ ΝΟΜΙΣΜΑΤΑ ΩΣ ΠΡΟΣ ΤΟ ΕΥΡΩ ΚΑΙ ΕΚΤΕΛΩ ΤΗΝ ΜΕΤΑΤΡΟΠΗ (Π.Χ. 0.7265 USD = 1 EUR ΚΤΛΠ)
		'Euro' => 1.0,					// stores the exchange rates relative to Euro and performs the conversion
		'US Dollar' => 0.7265,
		'Swiss Franc' => 0.8279,
		'JPY' => 0.00947,
		'CAD' => 0.7319,
		'British Pound' => 1.1453
	];
	
	public function get($currency) {			
		if (isset($this->rates[$currency])) {
			$rate = 1/$this->rates[$currency];
			return round($this->baseValue * $rate, 4);
			
		}
		else return 0;		
	}
	
	public function set($amount, $currency = 'Euro') {
		if (isset($this->rates[$currency])) {
			$this->baseValue = $amount * $this->rates[$currency];
		}
	}
	
}

//View 
class CurrencyConverterView {					//ΕΠΙΣΤΡΕΦΕΙ ΤΟ Converted Value ΕΦΟΣΟΝ ΕΧΕΙ ΠΕΡΑΣΤΕΙ ΤΟ Model
	private $converter;							//pass it the model, and display the value
	private $currency;
	
	public function __construct(CurrencyConverter $converter, $currency) {
		$this->converter = $converter;
		$this->currency = $currency;
	}
	
	public function output() {												
				
		$html = '<div id="outputval""><center><b>Your Converted Value is :' . $this->converter->get($this->currency) . ' ' . $this->currency. '</b><br></center></div>';
									
		return $html;
	}
}

//Controller
class CurrencyConverterController {				//ΧΡΗΣΙΜΟΠΟΙΕΙ ΤΑ ΟΝΟΜΑΤΑ ΤΩΝ ΠΕΔΙΩΝ ΠΟΥ ΕΧΟΥΜΕ ΔΗΜΙΟΥΡΓΗΣΕΙ ΣΤΟ View
	private $model;								//This uses the form field names which we already created in the view
	
	public function __construct($model) {
		$this->model = $model;
	}
	
	public function convert($request) {
										
		if (isset($request['currency']) && isset($request['amount'])) {
			$this->model->set($request['amount'], $request['currency']);			
		}
	}
}
	$model = new CurrencyConverter();
	$controller = new CurrencyConverterController($model);
	

//If the form submitted,call the Controller
if (isset($_GET['action'])) $controller->{$_GET['action']}($_POST) ;   //ΟΤΑΝ Η ΦΟΡΜΑ ΓΙΝΕΙ submit ΚΑΛΕΙ ΤΟ Controller
	
																		
	if( $curTo=="Euro"){												//ΕΛΕΓΧΩ ΠΟΙΟ currency ΕΧΩ TARGET ΚΑΙ ΕΚΤΥΠΩΝΩ ΤΟ ΑΝΑΛΟΓΟ ΠΟΣΟ																		
		$eurView = new CurrencyConverterView($model, 'Euro');			//CHECKING THE TRAGET CURRENCY AND PRINTING THE WANTED VALUE
		echo $eurView->output();
	}
	if( $curTo=="US Dollar"){
		$usdView = new CurrencyConverterView($model, 'US Dollar');
		echo $usdView->output();
	}
	if( $curTo=="Swiss Franc"){
		$sfcView = new CurrencyConverterView($model, 'Swiss Franc');
		echo $sfcView->output();
	}
	if( $curTo=="British Pound"){
		$gbpView = new CurrencyConverterView($model, 'British Pound');
		echo $gbpView->output();
	}
	if( $curTo=="JPY"){
		$jpyView = new CurrencyConverterView($model, 'JPY');
		echo $jpyView->output();
	}
	if( $curTo=="CAD"){
		$cadView = new CurrencyConverterView($model, 'CAD');
		echo $cadView->output();
	}
	
?>
