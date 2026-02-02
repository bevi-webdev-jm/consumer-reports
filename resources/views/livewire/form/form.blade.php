<div>
    @switch($step)
        {{-- INTRO --}}
        @case(0)
            <div class="glass-card" wire:transition wire:key="step-0">
                <h1>Consumer Safety Reporting</h1>
                <p>
                    At <strong>BEVI (Beauty Elements Ventures Incorporated)</strong>, your safety and satisfaction are our top priorities. We are committed to ensuring that every customer who purchases <strong>BEVI</strong> products receives <strong>authentic, high-quality items</strong> that meet our strict standards.
                </p>
                <p>
                    This Consumer Safety Reporting Mechanism is provided to help us review concerns related to product quality or authenticity. If you are <strong>not satisfied with a product or suspect that the item you purchased may be counterfeit</strong>, we encourage you to submit the details through this form so our team can properly assess and investigate the matter.
                </p>
                <p>
                    All information shared will be treated with care and used solely for verification and consumer safety purposes. Your report helps us protect our customers and maintain the integrity of our brands.
                </p>
                <p>
                    Thank you for helping us ensure that only genuine BEVI products reach our consumers.
                </p>

                <button class="btn-primary" wire:click.prevent="nextStep">Submit a Report</button>
            </div>
        @break
        {{-- DATA PRIVACY CONSENT--}}
        @case(1)
            <div class="glass-card" wire:transition wire:key="step-1">
                <div class="icon-header">
                    <div class="privacy-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <h1>Data Privacy Consent</h1>
                </div>

                <p class="lead-text">
                    Your personal data will be processed solely for legitimate business purposes and handled in accordance with applicable data protection laws. For inquiries or data-related requests, please contact the Company.
                </p>

                <div class="privacy-features">
                    <div class="feature">
                        <span class="dot"></span>
                        <p>
                            <strong>Data Processing:</strong>
                            I confirm that I have read and understood the Data Privacy Notice and consent to the collection, use, processing, and storage of my personal data for legitimate business purposes, in accordance with applicable data protection laws.
                        </p>
                    </div>

                    <label class="checkbox-item" wire:key="cat-other">
                        <input type="checkbox" wire:model.live="marketing_consent" value="1">
                        <span class="custom-check"></span>
                        I also agree to receive marketing, promotional, or informational communications and understand that I may withdraw my consent at any time.
                    </label>
                </div>

                <div class="action-group">
                    <button wire:click.prevent="nextStep" class="btn-primary">Accept & Continue</button>
                    <button wire:click.prevent="previousStep" class="btn-glass">Back</button>
                </div>
            </div>
        @break
        {{-- FORM --}}
        @case(2)
            <div class="glass-card" wire:key="step-2">
                <div class="form-header">
                    <h1>Purchase Details</h1>
                    <p>Please provide the information found on your product packaging or receipt.</p>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label>Batch Number <span class="text-danger">*</span></label>
                        <input type="text" wire:model.blur="formData.batch_number" placeholder="e.g. BN12345" {{ $errors->has('formData.batch_number') ? 'class=is-invalid' : '' }}>
                    </div>

                    <div class="input-group">
                        <label>Date of Purchase <span class="text-danger">*</span></label>
                        <input type="date" wire:model.blur="formData.purchase_date" {{ $errors->has('formData.purchase_date') ? 'class=is-invalid' : '' }}>
                    </div>

                    <div class="input-group">
                        <label>Retail Store / Online Shop <span class="text-danger">*</span></label>
                        <input type="text" wire:model.blur="formData.store_name" placeholder="Where did you buy it?" {{ $errors->has('formData.store_name') ? 'class=is-invalid' : '' }}>
                    </div>

                    <div class="input-group">
                        <label>Country <span class="text-danger">*</span></label>
                        <select wire:model.blur="formData.country" {{ $errors->has('formData.country') ? 'class=is-invalid' : '' }}>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group">
                        <label>Amount Paid <span class="text-danger">*</span></label>
                        <input type="number" wire:model.blur="formData.amount_paid" placeholder="0.00" {{ $errors->has('formData.amount_paid') ? 'class=is-invalid' : '' }}>
                    </div>

                    <div class="input-group full-width">
                        <label>Proof of Purchase (Receipt/Photo)</label>
                        @if(!empty($proof_of_purchase))
                            <div class="uploaded-files-preview">
                                @foreach($proof_of_purchase as $index => $file)
                                    <div class="uploaded-file-card" wire:key="uploaded-file-{{ $index }}">
                                        <img src="{{ $file->temporaryUrl() }}" alt="Preview">
                                        <button type="button"
                                                class="btn-remove-file"
                                                wire:click.prevent="removeUploadedFile({{ $index }})"
                                                title="Remove image">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="file-upload-wrapper">
                            <input type="file" wire:model="proof_of_purchase" id="file-upload" multiple accept="image/*">
                            <label for="file-upload" class="file-label">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                <span>Click to upload photo</span>
                            </label>
                        </div>
                    </div>

                    <div class="input-group full-width" wire:key="category-group">
                        <label>Complaint Category <span class="text-danger">*</span></label>
                        <div class="checkbox-grid">
                            @foreach($categories as $index => $category)
                                <label class="checkbox-item" wire:key="cat-{{ $index }}">
                                    <input type="checkbox" wire:model.live="formData.categories.{{ $index }}" value="{{ $index }}">
                                    <span class="custom-check"></span>
                                    {{ $index + 1 }}. {{ $category }}
                                </label>
                            @endforeach

                            <label class="checkbox-item" wire:key="cat-other">
                                <input type="checkbox" wire:model.live="showOtherInput" value="other">
                                <span class="custom-check"></span>
                                Other
                            </label>
                        </div>

                        <div id="other-field-anchor" wire:key="other-field-anchor">
                            @if($showOtherInput)
                                <div class="other-input-wrapper full-width" wire:key="description-group">
                                    <input type="text" wire:model.blur="other_category_detail" placeholder="Please specify the category">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="input-group full-width">
                        <label>Description of Complaint <span class="text-danger">*</span></label>
                        <textarea wire:model.blur="formData.complaint_description" rows="4" placeholder="Please provide as much detail as possible regarding the issue..."></textarea>
                        <small class="input-hint">Maximum 500 characters</small>
                    </div>
                </div>

                <div class="action-group">
                    <button wire:click.prevent="nextStep" class="btn-primary">Next</button>
                    <button wire:click.prevent="previousStep" class="btn-glass">Back</button>
                </div>
            </div>
        @break
        {{-- CONTACT DETAILS--}}
        @case(3)
            <div class="glass-card" wire:transition wire:key="step-3">
                <div class="form-header">
                    <h1>Contact Details</h1>
                    <p>This information will be used exclusively for review and verification purposes and will not be used for marketing unless explicitly authorized.</p>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label>Email Address</label>
                        <input type="text" wire:model.blur="formData.email_address" placeholder="e.g. john.doe@example.com">
                    </div>

                    <div class="input-group">
                        <label>Contact Number</label>
                        <input type="text" wire:model.blur="formData.contact_number" placeholder="e.g. +1 (555) 123-4567">
                    </div>
                </div>

                <div class="action-group">
                    <button wire:click.prevent="submitReport" class="btn-primary">Submit Report</button>
                    <button wire:click.prevent="previousStep" class="btn-glass">Back</button>
                </div>
            </div>
        @break

    @endswitch

    <style>
        /* Header & Icon */
        .icon-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .privacy-icon {
            width: 64px;
            height: 64px;
            background: rgba(0, 0, 0, 0.05);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: #000;
        }

        .lead-text {
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        /* Feature List */
        .privacy-features {
            background: rgba(0, 0, 0, 0.03);
            padding: 1.5rem;
            border-radius: 20px;
            margin-bottom: 2.5rem;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .feature:last-child { margin-bottom: 0; }

        .feature p {
            margin: 0;
            font-size: 0.95rem;
            color: rgba(0, 0, 0, 0.7);
        }

        .dot {
            width: 8px;
            height: 8px;
            background: #d85b3c; /* Matching your blob color */
            border-radius: 50%;
        }

        /* Action Buttons */
        .action-group {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .btn-primary {
            display: inline-block;
            margin-top: 1rem;
            padding: 14px 28px;
            background: black;
            color: #ffffff;
            text-decoration: none;
            border-radius: 16px;
            font-weight: 600;
            font-size: 1rem;

            /* Glass properties for the button */
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);

            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 480px) {
            .action-group {
                flex-direction: column;
            }
            .btn-primary, .btn-glass {
                text-align: center;
            }
        }

        /* Form Layout */
        .form-header { margin-bottom: 2rem; }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .full-width { grid-column: span 2; }

        /* Input Styling */
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .input-group label {
            font-size: 0.85rem;
            font-weight: 600;
            color: rgba(0, 0, 0, 0.6);
            margin-left: 4px;
        }

        .input-group input,
        .input-group select {
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.5);
            font-family: var(--apple-font);
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .input-group input:focus {
            outline: none;
            border-color: #d85b3c;
            background: white;
            box-shadow: 0 0 0 4px rgba(216, 91, 60, 0.1);
        }

        /* Custom File Upload */
        .file-upload-wrapper input { display: none; }
        .file-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 20px;
            border: 2px dashed rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .file-label:hover {
            background: rgba(255, 255, 255, 0.6);
            border-color: #d85b3c;
        }

        /* Checkbox Grid */
        .checkbox-grid {
            display: grid;
            gap: 12px;
            margin-top: 8px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
            cursor: pointer;
            padding: 10px;
            border-radius: 10px;
            transition: background 0.2s;
        }

        .checkbox-item:hover { background: rgba(0,0,0,0.03); }

        /* Mobile Adjustments */
        @media (max-width: 600px) {
            .form-grid { grid-template-columns: 1fr; }
            .full-width { grid-column: span 1; }
        }

        /* Textarea Styling */
        .input-group textarea {
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.5);
            font-family: var(--apple-font);
            font-size: 1rem;
            resize: vertical;
            min-height: 100px;
            transition: all 0.2s ease;
        }

        .input-group textarea:focus {
            outline: none;
            border-color: #d85b3c;
            background: white;
            box-shadow: 0 0 0 4px rgba(216, 91, 60, 0.1);
        }

        /* Other Input Animation */
        .other-input-wrapper {
            margin-top: 10px;
            animation: slideDown 0.3s ease-out;
        }
        .other-input-wrapper input {
            width: 100%;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .input-hint {
            font-size: 0.75rem;
            color: rgba(0, 0, 0, 0.4);
            margin-top: 4px;
            margin-left: 4px;
        }

        /* Fix for Checkbox alignment */
        .checkbox-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #d85b3c;
        }

        /* Container for the image grid */
        .uploaded-files-preview {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 12px;
            margin-bottom: 15px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Individual Image Card */
        .uploaded-file-card {
            position: relative;
            aspect-ratio: 1 / 1;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: transform 0.2s ease;
        }

        .uploaded-file-card:hover {
            transform: scale(1.05);
        }

        .uploaded-file-card img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Keeps photos looking professional */
        }

        /* Floating Remove Button */
        .btn-remove-file {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(4px);
            border: none;
            color: #ff3b30; /* iOS Red */
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            transition: all 0.2s ease;
            padding: 0;
        }

        .btn-remove-file:hover {
            background: #ff3b30;
            color: #ffffff;
            transform: rotate(90deg);
        }

        .is-invalid {
            border-color: #d85b3c !important;
            box-shadow: 0 0 0 4px rgba(216, 91, 60, 0.1) !important;
        }

        .text-danger {
            color: #d85b3c !important;
        }
    </style>
</div>
