<?php

namespace Modules\Settings\Service;

use Modules\Core\Service\CoreService;
use Modules\Core\Traits\ImageUpload;
use Modules\Settings\Repository\SettingsRepository;

class SettingsService extends CoreService
{
    use ImageUpload;

    private SettingsRepository $settings_repository;

    public function __construct(SettingsRepository $settings_repository)
    {
        $this->settings_repository = $settings_repository;
    }

    /**
     * Get the first settings data.
     *
     * @return object
     */
    public function getData(): object
    {
        return $this->settings_repository->findFirst();
    }

    /**
     * Update settings.
     *
     * @param  int  $id
     * @param  array<string, mixed>  $data
     * @return mixed
     */
    public function update(int $id, array $data): mixed
    {
        return $this->settings_repository->update($id,
            collect($data)->except(['logo'])->toArray() + [
                'logo' => $this->verifyAndStoreImage($data['logo']),
            ]
        );
    }
}
