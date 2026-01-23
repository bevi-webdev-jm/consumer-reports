<?php

namespace App\Livewire\Form;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Session;
use App\Models\Country;

class Form extends Component
{
    use WithFileUploads;
    public $step = 0;
    public $categories = [
        'Suspected Counterfeit or Fake Product : The product appears different from authentic BEVI products or shows signs of being fake',
        'Unusual Packaging or Labeling : Packaging looks different, damaged, missing information, or inconsistent with official BEVI packaging. (i.e Misspelled text, Poor print quality, Missing batch/lot number, Incorrect logo, color, or design).',
        'Product Quality Issue : The product quality does not meet expectations or differs from previous authentic purchases. (Unusual smell, color, or texture; Product does not perform as expected; Signs of tampering or contamination).',
        'Missing or Invalid Batch / Lot Information : Batch number, manufacturing date, or expiration date is missing, altered, or unclear.',
        'Purchased from an Unauthorized or Unverified Seller : The product was bought from a seller or store that may not be an authorized BEVI retailer.',
        'Price Significantly Lower Than Usual Market Price : The product was sold at a price that seems unusually low compared to official or authorized sellers.',
        'Product Condition Upon Purchase : The product appeared previously opened, resealed, or damaged at the time of purchase.',
        'The product appeared previously opened, resealed, or damaged at the time of purchase.',
        'Adverse Reaction or Safety Concern : The product caused irritation, discomfort, or any unexpected reaction.',
        'Mismatch Between Product and Online Listing : The product received does not match the description or images shown online.',
    ];

    public $showOtherInput = false;
    public $formData = [];
    public $proof_of_purchase;

    public function render()
    {
        $countries = Country::all();

        return view('livewire.form.form')->with([
            'countries' => $countries,
        ]);
    }

    public function mount() {

        $form_entry_data = Session::get('form_entry_data', null);
        if(!empty($form_entry_data)) {
            $this->formData = $form_entry_data['formData'];
            $this->step = $form_entry_data['step'];
            $this->showOtherInput = $form_entry_data['showOtherInput'];
        }

        Session::forget('form_entry_data');
    }

    public function nextStep()
    {
        if($this->step == 2) {
            $this->validate([
                'formData.batch_number' => 'required',
                'formData.purchase_date' => 'required|date',
                'formData.store_name' => 'required|string',
                'formData.country' => 'required|string',
                'formData.amount_paid' => 'required|numeric',
            ]);
        }

        $this->step++;
        $this->saveSessionData();


    }

    public function previousStep()
    {
        $this->step--;
        $this->saveSessionData();
    }

    private function saveSessionData() {
        $form_entry_data = [
            'formData' => $this->formData,
            'step' => $this->step,
            'showOtherInput' => $this->showOtherInput,
        ];

        Session::put('form_entry_data', $form_entry_data);
    }

    public function updatedFormData() {
        $this->saveSessionData();
    }

    public function submitReport() {
    }

}
