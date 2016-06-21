<?php
if ($user->hasRole("superuser")):
$currentPage = $this->pages->findOne("template='simple_contact_form_messages'"); ?>
<h1><?= $currentPage->title; ?></h1>
<table>
<thead>
<tr>
<th><?= $fields->get("scf_fullName")->label; ?></th>
<th><?= $fields->get("scf_email")->label; ?></th>
<th><?= $fields->get("scf_message")->label; ?></th>
<th><?= $fields->get("scf_date")->label; ?></th>
<th><?= $fields->get("scf_ip")->label; ?></th>
<th><?= $fields->get("scf_template")->label; ?></th>
</tr>
</thead>
<tbody>
<?php foreach ($currentPage->repeater_scfmessages->find("scf_spamIp=,scf_spamMail=")->sort('-scf-date') as $message): ?>
<tr>
<td><?= $message->scf_fullName; ?></td>
<td><a href='mailto:<?= $message->scf_email; ?>'><?= $message->scf_email; ?></a></td>
<td><?= $message->scf_message; ?></td>
<td><?= date("d.m.Y H:i", $message->scf_date); ?></td>
<td><?= $message->scf_ip; ?></td>
<td><?= $message->scf_template; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php else: ?>
<?php $session->redirect($pages->get("/")->url); ?>
<?php endif; ?>