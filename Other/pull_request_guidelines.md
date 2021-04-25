# Pull Request Guidelines
1. Fork this project repository.
2. Add your forked repo to your local directory.
``` bash
git remote add origin <forked-repo-URL>
```
3. Create a new branch based on your selected topic.
``` bash
git checkout -b <topic-branch-name>
```
4. Commit your change. 
``` bash
git commit -m "Commit-Messege"
```
5. Before push, make sure to get the latest project update.
``` bash
git pull --rebase origin <dev-branch>
```
6. Push your topic branch up to your fork repository.
``` bash
git push origin <topic-branch-name>
```
7. Create a pull request 

After pushing to your forked repository, now you can create a pull request for your project, and to do that, you can use our [Pull Request Template](<pull-request-template-URL>).

8. Review Pull Request.

After creating Pull Request, our collaborator will review your Pull Request and ensure that your code fits with this project code. We will give you feedback max: 3x24 Hours after you submit the Pull Request.

9. Finishing Up

When your Pull Request has been accepted by our collaborator, we will merge your new change in our development branch. Every { project-date-update } of the month, we will combine all development branches to the master. We will update these project blog docs.