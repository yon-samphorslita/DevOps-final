pipeline {
    agent any

    environment {
        EMAIL_RECIPIENTS = 'srengty@gmail.com, yon.samphorslita@gmail.com'
    }

    triggers {
        // Poll SCM every 5 minutes
        pollSCM('*/5 * * * *') // Poll every 5 minutes
    }

    stages {
        stage('Checkout') {
            steps {
                // Checkout the latest code from the repository
                git branch: 'terrain', url: 'https://github.com/yon-samphorslita/DevOps-final.git'
            }
        }

        stage('Build') {
            steps {
                // Build the project (e.g., composer install for Laravel)
                script {
                    try {
                        sh 'composer install --no-dev --optimize-autoloader'
                    } catch (Exception e) {
                        currentBuild.result = 'FAILURE'
                        throw e
                    }
                }
            }
        }

        stage('Test') {
            steps {
                // Run tests (e.g., Pest or PHPUnit tests)
                script {
                    try {
                        sh './vendor/bin/pest --quiet'
                    } catch (Exception e) {
                        currentBuild.result = 'FAILURE'
                        throw e
                    }
                }
            }
        }

        stage('Deploy') {
            when {
                // Only deploy if build and tests pass
                expression { currentBuild.result == null || currentBuild.result == 'SUCCESS' }
            }
            steps {
                // Run Ansible Playbook to deploy the application
                script {
                    sh 'ansible-playbook -i inventory.yml deploy.yml'
                }
            }
        }
    }

    post {
        failure {
            // Send an email if the build fails
            mail to: 'developer@yourcompany.com',
                 cc: "${EMAIL_RECIPIENTS}",
                 subject: "Build Failed: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                 body: "Build failed in Jenkins: ${env.BUILD_URL}"
        }

        success {
            // Send an email on success
            mail to: 'developer@yourcompany.com',
                 cc: "${EMAIL_RECIPIENTS}",
                 subject: "Build Succeeded: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                 body: "Build succeeded in Jenkins: ${env.BUILD_URL}"
        }
    }
}
