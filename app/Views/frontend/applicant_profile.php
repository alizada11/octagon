<?= $this->extend('frontend/layout/main') ?>

<?= $this->section('content') ?>
<div class="container profile-page mt-4">
  <div class="card shadow-sm mb-4">
    <div class="card-header ">
      <h5 class="mb-0"><?= $profile['full_name'] ?? "Jobseeker profile" ?> <?= lang('Dashboard.profile') ?></h5>
    </div>
    <div class="card-body">
      <div class="container bg-white p-4 rounded">


        <?php if (!empty($profile)): ?>
          <div class="row ">
            <div class="col-md-4 d-flex flex-column align-items-center">
              <div class="profile-photo-container mb-3">
                <?php if (!empty($profile['photo'])): ?>
                  <img src="<?= base_url('uploads/jobseekers/' . $profile['photo']) ?>" alt="Photo" class="img-thumbnail profile-photo">
                <?php else: ?>
                  <div class="no-photo-placeholder bg-light border rounded d-flex align-items-center justify-content-center">
                    <i class="fas fa-user fa-3x text-muted"></i>
                  </div>
                <?php endif; ?>
              </div>
              <a href="<?= base_url('view/cv/' . $profile['user_id']) ?>" class="btn custom-btn "> <i class="fas fa-file-pdf mr-2"></i><?= lang('Global.view_cv') ?></a>

              <?php if (role_type() == "employer"): ?>
                <a href="<?= base_url('employer/hire/' . $profile['user_id']) ?>" class=" mt-3 btn custom-btn"><?= lang('Global.hire') ?></a>
              <?php endif; ?>
            </div>
            <div class="col-md-8">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <th class="bg-light" style="width: 40%;"><?= lang('Global.full_name') ?></th>
                      <td><?= esc($profile['full_name'] ?? lang('Global.N/A')) ?></td>
                    </tr>
                    <tr>
                      <th class="bg-light"><?= lang('Global.dob') ?></th>
                      <td><?= esc($profile['dob'] ?? lang('Global.N/A')) ?></td>
                    </tr>
                    <tr>
                      <th class="bg-light"><?= lang('Global.phone') ?></th>
                      <td><?= esc($profile['country_code'] . $profile['phone'] ?? lang('Global.N/A')) ?></td>
                    </tr>
                    <tr>
                      <th class="bg-light"><?= lang('app.email') ?></th>
                      <td><?= esc($user['email'] ?? lang('Global.N/A')) ?></td>
                    </tr>
                  </tbody>
                </table>
                <strong><?= lang('Global.interested_areas') ?>:<br></strong>
                <?php
                $availability = $profile['available_for_work'];
                if ($availability) {

                  if (is_array($availability)) {
                    foreach ($availability as $id) {
                      $title = interested_title($id);
                      echo '<span style="display:inline-block; margin:2px; padding:4px 10px; background-color:#eee; border-radius:12px; font-size:13px;">' . esc($title) . '</span>';
                    }
                  } else {
                    echo 'N/A';
                  }
                }
                ?>
              </div>
            </div>
          </div>
        <?php else: ?>
          <div class="alert alert-info text-center"><?= lang('Global.no_profile_found') ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Personal Information Section -->
  <div class="card shadow-sm mb-4">
    <div class="card-header">
      <h4 class="mb-0"><i class="fas fa-user-circle mr-2"></i><?= lang('Global.personal_information') ?></h4>
    </div>
    <div class="card-body">
      <?php if (!empty($profile)): ?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <tbody>
              <tr>
                <th class="bg-light" style="width: 30%;"><?= lang('Global.gender') ?></th>
                <td style="width: 30%;"><?= esc($profile['gender'] ?? lang('Global.N/A')) ?></td>
              </tr>
              <tr>
                <th class="bg-light"><?= lang('Global.marital_status') ?></th>
                <td><?= esc($profile['marital_status'] ?? lang('Global.N/A')) ?></td>
              </tr>
              <tr>
                <th class="bg-light"><?= lang('Global.nationality') ?></th>
                <td><?= esc($profile['nationality'] ?? lang('Global.N/A')) ?></td>
              </tr>
              <tr>
                <th class="bg-light"><?= lang('Global.address') ?></th>
                <td><?= esc($profile['address'] ?? lang('Global.N/A')) ?></td>
              </tr>
              <tr>
                <th class="bg-light"><?= lang('Global.religion') ?></th>
                <td><?= esc($profile['religion'] ?? lang('Global.N/A')) ?></td>
              </tr>
              <tr>
                <th class="bg-light"><?= lang('Global.no_of_children') ?></th>
                <td><?= esc($profile['no_of_children'] ?? lang('Global.N/A')) ?></td>
              </tr>
              <tr>
                <th class="bg-light"><?= lang('Global.place_of_birth') ?></th>
                <td><?= esc($profile['place_of_birth'] ?? lang('Global.N/A')) ?></td>
              </tr>
              <tr>
                <th class="bg-light"><?= lang('Global.living_town') ?></th>
                <td><?= esc($profile['living_town'] ?? lang('Global.N/A')) ?></td>
              </tr>
              <tr>
                <th class="bg-light"><?= lang('Global.weight') ?></th>
                <td><?= esc($profile['weight'] ?? lang('Global.N/A')) ?></td>
              </tr>
              <tr>
                <th class="bg-light"><?= lang('Global.height') ?></th>
                <td><?= esc($profile['height'] ?? lang('Global.N/A')) ?></td>
              </tr>
              <tr>
                <th class="bg-light"><?= lang('Global.complexion') ?></th>
                <td><?= esc($profile['complexion'] ?? lang('Global.N/A')) ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Education Section -->
  <div class="card shadow-sm mb-4">
    <div class="card-header ">
      <h4 class="mb-0"><i class="fas fa-graduation-cap mr-2"></i><?= lang('Global.education') ?></h4>
    </div>
    <div class="card-body">
      <?php if (!empty($educations)): ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th><?= lang('Global.institution') ?></th>
                <th><?= lang('Global.degree') ?></th>
                <th><?= lang('Global.field_of_study') ?></th>
                <th><?= lang('Global.from') ?></th>
                <th><?= lang('Global.to') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($educations as $edu): ?>
                <tr>
                  <td><?= esc($edu['institution']) ?></td>
                  <td><?= esc($edu['degree']) ?></td>
                  <td><?= esc($edu['field_of_study']) ?></td>
                  <td><?= esc($edu['start_year']) ?></td>
                  <td><?= esc($edu['end_year']) ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="alert alert-warning"><?= lang('Global.no_editeries_found') ?>.</div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Experience Section -->
  <div class="card shadow-sm mb-4">
    <div class="card-header text-dark">
      <h4 class="mb-0"><i class="fas fa-briefcase mr-2"></i><?= lang('Dashboard.experiences') ?></h4>
    </div>
    <div class="card-body">
      <?php if (!empty($experiences)): ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th><?= lang('Global.company') ?></th>
                <th><?= lang('Global.job_title') ?></th>
                <th><?= lang('Global.from') ?></th>
                <th><?= lang('Global.to') ?></th>
                <th><?= lang('Global.description') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($experiences as $item): ?>
                <tr>
                  <td><?= esc($item['company_name']) ?></td>
                  <td><?= esc($item['job_title']) ?></td>
                  <td><?= esc($item['start_date']) ?></td>
                  <td><?= esc($item['end_date']) ?></td>
                  <td><?= esc($item['description']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="alert alert-warning"><?= lang('Global.no_editeries_found') ?>.</div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Skills & Languages Section -->
  <div class="row">
    <!-- Languages -->
    <div class="col-md-6">
      <div class="card shadow-sm mb-4">
        <div class="card-header">
          <h4 class="mb-0"><i class="fas fa-language mr-2"></i><?= lang('Dashboard.language_skill') ?></h4>
        </div>
        <div class="card-body">
          <?php if (!empty($languages)): ?>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>Language</th>
                    <th>Proficiency</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($languages as $item): ?>
                    <tr>
                      <td><?= esc($item['language']) ?></td>
                      <td>
                        <div class="progress" style="height: 20px;">
                          <?php
                          $progress = 0;
                          switch ($item['proficiency']) {
                            case 'Basic':
                              $progress = 30;
                              break;
                            case 'Intermediate':
                              $progress = 60;
                              break;
                            case 'Advanced':
                              $progress = 80;
                              break;
                            case 'Fluent':
                              $progress = 100;
                              break;
                            default:
                              $progress = 20;
                          }
                          ?>
                          <div class="progress-bar bg-info" role="progressbar" style="width: <?= $progress ?>%;"
                            aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100">
                            <?= esc($item['proficiency']) ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else: ?>
            <div class="alert alert-warning">
              <?= lang('Global.no_editeries_found') ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Skills -->
    <div class="col-md-6">
      <div class="card shadow-sm mb-4">
        <div class="card-header ">
          <h4 class="mb-0"><i class="fas fa-tools mr-2"></i><?= lang('Dashboard.skills') ?></h4>
        </div>
        <div class="card-body">
          <?php if (!empty($skills)): ?>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>
                      <?= lang('Global.skill') ?>
                    </th>
                    <th><?= lang('Global.level') ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($skills as $item): ?>
                    <tr>
                      <td><?= esc($item['skill_name']) ?></td>
                      <td>
                        <div class="progress" style="height: 20px;">
                          <?php
                          $progress = 0;
                          switch ($item['level']) {
                            case 'Beginner':
                              $progress = 30;
                              break;
                            case 'Intermediate':
                              $progress = 60;
                              break;
                            case 'Advanced':
                              $progress = 80;
                              break;
                            case 'Expert':
                              $progress = 100;
                              break;
                            default:
                              $progress = 20;
                          }
                          ?>
                          <div class="progress-bar bg-success" role="progressbar" style="width: <?= $progress ?>%;"
                            aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100">
                            <?= esc($item['level']) ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else: ?>
            <div class="alert alert-warning">
              <p><?= lang('Global.no_editeries_found') ?></p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Passport Information -->
  <div class="card shadow-sm mb-4">
    <div class="card-header ">
      <h4 class="mb-0"><i class="fas fa-passport mr-2"></i><?= lang('Global.passport_info') ?></h4>
    </div>
    <div class="card-body">
      <?php if (!empty($passports)): ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th><?= lang('Global.passport_number') ?></th>
                <th><?= lang('Global.place_of_issue') ?></th>
                <th><?= lang('Global.date_of_issue') ?></th>
                <th><?= lang('Global.date_of_expiry') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($passports as $item): ?>
                <tr>
                  <td><?= esc($item['number']) ?></td>
                  <td><?= esc($item['place_of_issue']) ?></td>
                  <td><?= esc($item['date_of_issue']) ?></td>
                  <td><?= esc($item['date_of_expiry']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="alert alert-warning">
          <p><?= lang('Global.no_editeries_found') ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<style>
  .profile-photo {
    width: 200px;
    height: 200px;
    object-fit: cover;
  }

  .no-photo-placeholder {
    width: 200px;
    height: 200px;
  }

  .card-header {
    border-radius: 0.25rem 0.25rem 0 0 !important;
  }

  .progress {
    border-radius: 10px;
  }

  .progress-bar {
    font-size: 0.8rem;
    line-height: 20px;
  }

  th.bg-light {
    background-color: #f8f9fa !important;
  }

  .table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.03);
  }

  .profile-page i.fas {
    color: #000;
  }
</style>

<?= $this->endSection() ?>