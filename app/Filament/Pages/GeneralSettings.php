<?php

namespace App\Filament\Pages;

use Filament\Forms\Components;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Spatie\ResponseCache\Facades\ResponseCache;
use Spatie\Valuestore\Valuestore;

class GeneralSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.general-settings';

    public ?array $data = [];

    const KEYS = [
        'siteTitle',
        'siteDescription',
        'ogImage',
        'logo',
        'heroTitle',
        'heroSubtitle',
        'githubUrl',
        'linkedinUrl',
        'email',
    ];

    public function mount(): void
    {
        $settings = Valuestore::make(storage_path('app/settings.json'));

        $data = [];

        foreach(self::KEYS as $key) {
            $data[$key] = $settings->get($key);
        }

        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Heading')
                ->tabs([
                    Tabs\Tab::make('General Settings')
                        ->schema([
                            Components\Grid::make(2)
                                ->schema([
                                    Components\TextInput::make('siteTitle')
                                        ->default('Status Update'),
                                    Components\MarkdownEditor::make('siteDescription')
                                        ->columnSpan('full'),
                                    Components\FileUpload::make('ogImage')->image()
                                        ->columnSpan('full'),
                                    Components\TextInput::make('email')
                                        ->columnSpan('full'),
                                    Components\FileUpload::make('logo')->image()
                                        ->columnSpan('full'),
                                    Components\TextInput::make('heroTitle')
                                        ->columnSpan('full'),
                                    Components\Textarea::make('heroSubtitle')
                                        ->columnSpan('full'),
                                    Components\TextInput::make('githubUrl')
                                        ->columnSpan('full'),
                                    Components\TextInput::make('linkedinUrl')
                                        ->columnSpan('full'),
                                ])
                        ]),
                ])
        ])
        ->statePath('data');
    }

    public function submit(): void
    {
        $settings = Valuestore::make(storage_path('app/settings.json'));

        $settings->put($this->form->getState());
        
        ResponseCache::clear();

        Notification::make()
            ->title('Saved')
            ->success()
            ->send();
    }
}
