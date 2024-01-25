<?php

namespace App\Rules;

use App\Models\LibrarySection;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AvailableBook implements ValidationRule
{
    protected $librarySectionId;

    public function __construct($librarySectionId)
    {
        $this->librarySectionId = $librarySectionId;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $librarySection = LibrarySection::find($this->librarySectionId);

        if (!$librarySection || $librarySection->available_copies <= 0) {
            $fail("El libro en la sección seleccionada no está disponible.");
        }
    }


}
