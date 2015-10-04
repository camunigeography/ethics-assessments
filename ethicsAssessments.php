<?php

# Class implementing a research ethics assessment system
require_once ('reviewable-assessments/reviewableAssessments.php');
class ethicsAssessments extends reviewableAssessments
{
	# Function to assign defaults additional to the general application defaults
	public function defaults ()
	{
		# Add implementation defaults
		$defaults = array (
			'applicationName'		=> 'Research ethics assessments',
			'database'				=> 'ethicsassessments',
			'description'			=> 'research ethics assessment',
			'descriptionPlural'		=> 'research ethics assessments',
			'directorDescription'	=> 'Ethics Review Group Chair',
		);
		
		# Merge in the default defaults
		$defaults += parent::defaults ();
		
		# Return the defaults
		return $defaults;
	}
	
	
	# Database structure
	public function databaseStructureSpecificFields ()
	{
		return parent::databaseStructureSpecificFields ();
	}
	
	
	# Submission form
	public function submissionForm ($data)
	{
		return parent::submissionForm ($data);
	}
	
	
	# Function to define the asssessment form template
	public function formTemplateLocal ($data, $watermark)
	{
		$html = '<h3>Section B &#8211; Questionnaire</h3>';
		$html .= $watermark;
		
		$html .= '
		<style type="text/css">
			table.questionnaire td select + br + textarea {margin-left: 50px;}
		</style>
		
		<table class="graybox questionnaire">
			<tbody>
				<tr>
					<td>5. Who is funding your research (e.g. self-funded, ESRC, NERC)?</td>
					<td>{funder}</td>
				</tr>
				<tr>
					<td>6. Title of Dissertation/Research Project</td>
					<td>{title}</td>
				</tr>
				<tr>
					<td>7. Brief summary of research topic (approx 100 words)</td>
					<td>{topic}</td>
				</tr>
				<tr>
					<td>8. Have you read and understood the &quot;Research ethics: Guiding principles&quot; and &quot;project ethics&quot; sections on the intranet?</td>
					<td>{guidance}</td>
				</tr>
				<tr>
					<td>9. List all fieldwork methods that you intend to use (e.g. interviews, water sampling, archival work)</td>
					<td>{methods}</td>
				</tr>
				<tr>
					<td>10. Does your research involve the use of social media (in terms of accessing and/or disseminating data)? If YES, please explain how you will manage the ethical implications and ensure informed consent.</td>
					<td>
						{socialMedia}<br />
						{socialMediaDetails}
					</td>
				</tr>
				<tr>
					<td>11. Will any of the proposed research be harmful or intrusive to (a) people (e.g. using blood or tissue samples either self-collected or from archives/storage, physical or emotional pain), (b) the environment (e.g. damage to paths, vegetation) and/or (c) animals (e.g. risk to animal welfare)? If YES to one or more of these, how will you address this?</td>
					<td>
						{harm}<br />
						{harmDetails}
					</td>
				</tr>
				<tr>
					<td>12. Will your research need the support of a gatekeeper (e.g. head-teacher, NGO, self-help group, government official) for you to access people/place(s)? If YES, describe how you intend to negotiate access to your research participants/place(s) through this gatekeeper.</td>
					<td>
						{gatekeeper}<br />
						{gatekeeperDetails}
					</td>
				</tr>
				<tr>
					<td>13. Will you have a formal or informal association with any organisations during your fieldwork (e.g. voluntary work placement, connection to a local organisation/NGO/school, recruitment through the NHS*)? If YES, how have you sought permission to conduct research from those involved?</td>
					<td>
						{organisations}<br />
						{organisationsDetails}
					</td>
				</tr>
				<tr>
					<td>14. Will the study involve participants who are vulnerable (e.g. children, homeless, refugees, elderly people)? If YES, describe any special consideration you will give (e.g. DBS for work with under-16s, issues of inclusion, ensuring consent is fully comprehended).</td>
					<td>
						{vulnerable}<br />
						{vulnerableDetails}
					</td>
				</tr>
				<tr>
					<td>15. Will the study involve discussion of sensitive topics (e.g. sexual activity, drug use, violence, abuse)? If YES, describe how you will handle these topics in order to mitigate psychological stress or harm to participants.</td>
					<td>
						{sensitiveTopics}<br />
						{sensitiveTopicsDetails}
					</td>
				</tr>
				<tr>
					<td>16. Does your research involve human participants? If YES, describe how you will ensure informed consent (please include precise details of the information you will provide to participants to secure their informed consent).</td>
					<td>
						{humanParticipants}<br />
						{humanParticipantsDetails}
					</td>
				</tr>
				<tr>
					<td>17. Does your research involve data from humans (dead or alive)? If YES, please describe what steps will you take to ensure the confidentiality of your respondents (whether or not the research will be published).</td>
					<td>
						{humanData}<br />
						{humanDataDetails}
					</td>
				</tr>
				<tr>
					<td>18. Will it be necessary for participants to take part in the study without their knowledge and consent at the time (e.g. covert observation of people in non-public places)? If YES, how will you mitigate the potential negative consequences and ethical concerns of covert research?</td>
					<td>
						{covert}<br />
						{covertDetails}
					</td>
				</tr>
				<tr>
					<td>19. Will financial inducements (other than reasonable expenses and compensation for time) be offered to participants? If YES, how will you ensure this is handled to ensure integrity in your research?</td>
					<td>
						{inducements}<br />
						{inducementsDetails}
					</td>
				</tr>
				<tr>
					<td>20. Will the research be conducted by/alongside anyone other than yourself (e.g. translator, hiring enumerators, teachers)? If YES, please describe how will you train them to ensure ethical compliance.</td>
					<td>
						{assistants}<br />
						{assistantsDetails}
					</td>
				</tr>
				<tr>
					<td>21. Do you plan to undertake research outside the UK? If YES, describe any existing links with the country and explain how you intend to manage local cultural and political sensitivities. Please show how you intend to comply with any legal requirements for conducting research in that country.</td>
					<td>
						{abroad}<br />
						{abroadDetails}
					</td>
				</tr>
				<tr>
					<td>22. Please describe how you will ensure that you comply with the Data Protection Act.</td>
					<td>{dataProtection}</td>
				</tr>
			</tbody>
		</table>
		';
		
		# Final confirmation
		$html .= '
			<h3 class="pagebreak">Confirmation</h3>
			<div class="graybox">
				<p>All issues, however trivial they may seem, should be reported. I agree that if an incident occurs during the matters covered by this assessment, I will report this.</p>
				<p><strong>Tick to confirm: {confirmation}</strong></p>
			</div>
		';
		
		# Return the HTML
		return $html;
	}
}

?>